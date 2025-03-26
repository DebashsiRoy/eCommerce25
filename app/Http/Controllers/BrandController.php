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

       $brand_id = $request->input('id');
       $user_id = Auth::user()->id;

       // Retrieve the category record from the database
       $brand = Brand::where('user_id', $user_id)->where('id', $brand_id)->first();

       if ($brand && $brand->brandImg) {
           // Assuming the stored path is something like 'uploads/category/image.jpg'
           $filePath = public_path($brand->brandImg);

           // Check if the file exists before deleting
           if (File::exists($filePath)) {
               File::delete($filePath); // Delete the file
           }

           // Now, delete the category from the database
           return $brand->delete();
       }
   }



}
