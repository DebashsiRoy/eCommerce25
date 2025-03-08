<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function Brands()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.brand', compact('brands'));
    }
}
