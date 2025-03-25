<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Brand;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    public function brandPage()
    {
        return view('Admin.pages.brand');
    }
   public function BrandList()
   {
        $user_id = Auth::id();
        return Brand::where('user_id', $user_id)->get();
   }
   public function BrandAdd(Request $request)
   {
       $userId = Auth::id();
       // Prepars File Name & path
       $img = $request->file('brandImg');  // database insert field

       $t = time();
       $file_name = $img->getClientOriginalName();
       $img_name = "{$userId}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
       $img_url = "uploads/brands/{$img_name}";  //

       // Upload File
       $img->move(public_path('uploads/brands/'), $img_name);


       return Brand::create([
           'brandName' => $request->input('brandName'),
           'brandImg' => $img_url,
           'slug' => Str::slug($request->input('brandName')),
           'user_id' => $userId,
       ]);

   }

   public function brandDelete(Request $request){
        $user_id = Auth::id();
        $brand_id = $request->get('id');
        $filePath = $request->input('file_path');
        File::delete($filePath);

        return Brand::where('id', $brand_id)->where('user_id', $user_id)->delete();
   }
}
