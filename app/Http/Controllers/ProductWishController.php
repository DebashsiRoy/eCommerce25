<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\ProductWish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductWishController extends Controller
{
    public function productWishList(Request $request): JsonResponse
    {
        $user_id = Auth::user()->id;

        $data = ProductWish::where('user_id', $user_id)
            ->with('product') // eager load related product
            ->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function CreateWishList(Request $request)
    {
        $user_id = Auth::id();

        $data = ProductWish::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $request->product_id],
            ['user_id' => $user_id, 'product_id' => $request->product_id],
        );
        return ResponseHelper::Out('success', $data, 200);
    }


    public function RemoveWishList(Request $request){
        $user_id=Auth::user()->id;
        $data = ProductWish::where(['user_id' => $user_id, 'product_id' => $request->product_id])->delete();
        return ResponseHelper::Out('success', $data, 200);
    }
}
