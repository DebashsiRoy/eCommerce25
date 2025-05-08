<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    function salePage()
    {
        return view('frontend.pages.sale-page');
    }

    function shopProducts()
    {
        $data=Product::orderBy('created_at')->get();
        return ResponseHelper::Out('success', $data, 200);
    }

}
