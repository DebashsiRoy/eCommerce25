<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
   public function BrandList()
   {
        $data = Brand::all();
        return ResponseHelper::Out('success', $data, 200);
   }
   public function BrandAdd(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       try {
           $userID = Auth::user()->id;
           $Img= $request->file('brandImg');
           $fileName = $Img->getClientOriginalName();

           $t=time();

           Brand::create([
               'name' => $request->input('name'),
               'image' => $request->input('image'),
           ]);
           return Response()->json([
               'status' => 'success',
               'message' => 'Brand added successfully!'
           ]);
       }
       catch (Exception $e) {
           return Response()->json([
               'status' => 'failed',
               'message' => 'Brand is not added!'
           ]);
       }
   }
}
