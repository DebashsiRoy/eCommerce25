<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductDetailController extends Controller
{
    public function productDetailsPage()
    {
        return view('Admin.pages.productDetails');
    }

    public function ProductDetailsList(Request $request)
    {
        return ProductDetail::all();
    }

    public function addProductDetails(Request $request): JsonResponse
    {
        // Validate incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'description' => 'required|string',
            'color' => 'required|string',
            'size' => 'required|string',
            'img1' => 'required|image',
            'img2' => 'required|image',
            'img3' => 'required|image',
            'img4' => 'required|image',
        ]);

        try {
            $user_id = Auth::id();  // fallback if no user logged in
            $timestamp = time();

            // Ensure upload directory exists
            $uploadPath = public_path('uploads/productDetails/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Handle each image file and generate unique filenames
            $img1 = $request->file('img1');
            $img2 = $request->file('img2');
            $img3 = $request->file('img3');
            $img4 = $request->file('img4');

            $img1_name = "{$user_id}_{$timestamp}_" . $img1->getClientOriginalName();
            $img2_name = "{$user_id}_{$timestamp}_" . $img2->getClientOriginalName();
            $img3_name = "{$user_id}_{$timestamp}_" . $img3->getClientOriginalName();
            $img4_name = "{$user_id}_{$timestamp}_" . $img4->getClientOriginalName();

            // Move files to public uploads folder
            $img1->move($uploadPath, $img1_name);
            $img2->move($uploadPath, $img2_name);
            $img3->move($uploadPath, $img3_name);
            $img4->move($uploadPath, $img4_name);

            // Construct URLs (relative paths)
            $img1_url = "uploads/productDetails/{$img1_name}";
            $img2_url = "uploads/productDetails/{$img2_name}";
            $img3_url = "uploads/productDetails/{$img3_name}";
            $img4_url = "uploads/productDetails/{$img4_name}";

            // Get product_id correctly from request
            $product_id = $request->input('product_id');

            // Create product details record
            $data = ProductDetail::updateOrCreate(
                ['product_id' => $product_id], // Only this is used to check if the record exists
                [   // These are the values to update or insert
                    'description' => $request->input('description'),
                    'color' => $request->input('color'),
                    'size' => $request->input('size'),
                    'img1' => $img1_url,
                    'img2' => $img2_url,
                    'img3' => $img3_url,
                    'img4' => $img4_url,
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Product Details added successfully',
                'data' => $data
            ], 201);

        } catch (\Exception $e) {
            // Return detailed error for easier debugging (remove in production)
            return response()->json([
                'status' => 'fail',
                'message' => 'Product details is not added!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteProductDetails(Request $request)
    {
        try {
            $user_id = Auth::id() ?? 1; // fallback for testing
            $productDetails_id = $request->input('id');

            // Find the product detail record
            $details = ProductDetail::where('id', $productDetails_id)->first();

            if (!$details) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Product detail not found'
                ]);
            }

            // Delete images if they exist
            $images = [$details->img1, $details->img2, $details->img3, $details->img4];

            foreach ($images as $img) {
                $fullPath = public_path($img);
                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }

            // Delete the record
            $details->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Product details and images deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ]);
        }
    }

}
