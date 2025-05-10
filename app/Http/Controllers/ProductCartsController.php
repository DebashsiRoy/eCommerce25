<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use App\Models\ProductCarts;
use App\Models\ProductDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCartsController extends Controller
{
    public function CreateCartList(Request $request): JsonResponse
    {
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
        $color = $request->input('color');
        $size = $request->input('size');
        $qty = $request->input('qty');

        $UnitPrice=0;
        $productDetails=Product::where('id','=',$product_id)->first();
        if ($productDetails->discount==1){
            $UnitPrice=$productDetails->discount_price;
        }
        else{
            $UnitPrice=$productDetails->price;
        }
        $totalPrice=$UnitPrice*$qty;

        $cart = ProductCarts::updateOrCreate(
            ['user_id' => $user_id, 'product_id' => $product_id],
            [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'color' => $color,
                'size' => $size,
                'qty' => $qty,
                'price' => $totalPrice,
            ]
        );
        return ResponseHelper::Out('success', $cart, 200);
    }
    public function CartList(Request $request): JsonResponse
    {
        $user_id = Auth::id();
        $data = ProductCarts::where('user_id', $user_id)->with('product')->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    public function DeleteCartList(Request $request): JsonResponse

    {
        $user_id = Auth::id();
        $data = ProductCarts::where('user_id','=', $user_id)->where('product_id', '=', $request->product_id)->delete();
        return ResponseHelper::Out('success', $data, 200);
    }
}













