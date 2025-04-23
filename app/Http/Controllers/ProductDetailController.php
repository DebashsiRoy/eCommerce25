<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Exception;
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

    public function addProductDetails(Request $request)
    {
        try {
            $user_id = Auth::id();
            $t = time();

            $img1 = $request->file('img1');
            $img2 = $request->file('img2');
            $img3 = $request->file('img3');
            $img4 = $request->file('img4');

            $img1_name = "{$user_id}-{$t}_" . $img1->getClientOriginalName();
            $img2_name = "{$user_id}-{$t}_" . $img2->getClientOriginalName();
            $img3_name = "{$user_id}-{$t}_" . $img3->getClientOriginalName();
            $img4_name = "{$user_id}-{$t}_" . $img4->getClientOriginalName();

            $img1_url = "uploads/productDetails/{$img1_name}";
            $img2_url = "uploads/productDetails/{$img2_name}";
            $img3_url = "uploads/productDetails/{$img3_name}";
            $img4_url = "uploads/productDetails/{$img4_name}";

            $img1->move(public_path('uploads/productDetails/'), $img1_name);
            $img2->move(public_path('uploads/productDetails/'), $img2_name);
            $img3->move(public_path('uploads/productDetails/'), $img3_name);
            $img4->move(public_path('uploads/productDetails/'), $img4_name);

            $product_id = $request->input('product_id');


            ProductDetail::create([
                'img1' => $img1_url,
                'img2' => $img2_url,
                'img3' => $img3_url,
                'img4' => $img4_url,
                'description' => $request->input('description'),
                'color' => $request->input('color'),
                'size' => $request->input('size'),
                'product_id' => $product_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product details added successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Product details is not added!'
            ]);
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
