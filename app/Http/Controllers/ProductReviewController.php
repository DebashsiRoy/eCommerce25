<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function CreateProductReview(Request $request):JsonResponse
    {
        $user_id= Auth::user()->id;
    }
}
