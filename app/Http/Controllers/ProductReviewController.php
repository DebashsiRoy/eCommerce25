<?php

namespace App\Http\Controllers;


use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use App\Models\ProductReview;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function CreateProductReview(Request $request): JsonResponse
    {
        $user_id = Auth::user()->id;
        $profile = CustomerProfile::where('user_id', $user_id)->first(); // Fixed typo 'user_if' -> 'user_id'

        if ($profile) {
            $request->merge(['customer_id' => $profile->id]);
            $data = ProductReview::updateOrCreate(
                ['customer_id' => $profile->id, 'product_id' => $request->input('product_id')],
                $request->all()
            );
            return ResponseHelper::Out('success', $data, 200);
        } else {
            return ResponseHelper::Out('fail', 'Customer Profile not Exists', 400);
        }
    }

    public function ListReviewByProduct(Request $request):JsonResponse{
        $data=ProductReview::where('product_id',$request->product_id)
            ->with(['profile'=>function($query){
                $query->select('id','cus_name');
            }])->get();
        return ResponseHelper::Out('success',$data,200);
    }



}
