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
    public function brandListAll()
    {
        return Brand::all();
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

       try {
           Brand::create([
               'brandName' => $request->input('brandName'),
               'brandImg' => $img_url,
               'slug' => Str::slug($request->input('brandName')),
               'user_id' => $userId,
           ]);
           return response()->json([
               'status' => 'success',
               'message' => 'Brand added successfully!'
           ],200);
       } catch (Exception $e){
           return response()->json([
               'status' => 'failed',
               'message' => 'Enter Unique Brand Name'
           ],200);
       }

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



    // This section is for fill form by old data
    function BrandByID(Request $request)
    {
        $user_id = Auth::id();
        $brand_id=$request->input('id');
        return Brand::where('id',$brand_id)->where('user_id',$user_id)->first();
    }


    public function BrandUpdate(Request $request)
    {
        $brand_id = $request->input('id');
        $user_id = Auth::user()->id;
        $brand = Brand::where('user_id', $user_id)->where('id', $brand_id)->first();

        if ($request->hasFile('brandImg')) {
            // Upload New File
            $img = $request->file('brandImg');

            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$brand_id}-{$user_id}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
            $img_url = "uploads/brands/{$img_name}";
            $img->move(public_path('uploads/brands/'), $img_name);

            //Delete Old File
//            $filePath = public_path($request->input('file_path')); // Convert to absolute path
//
//            if (File::exists($filePath)) { // Check if file exists before deleting
//                File::delete($filePath);
//            }

            if ($brand && $brand->brandImg) {
                // Assuming the stored path is something like 'uploads/category/image.jpg'
                $filePath = public_path($brand->brandImg);

                // Check if the file exists before deleting
                if (File::exists($filePath)) {
                    File::delete($filePath); // Delete the file
                }
            }

            // Update Category
            return Brand::where('id', $brand_id)->where('user_id', $user_id)->update([
                'brandName' => $request->input('brandName'),
                'brandImg' => $img_url,
            ]);
        } else {
            // Only update category name if no file is uploaded
            return Brand::where('id', $brand_id)->where('user_id', $user_id)->update([
                'brandName' => $request->input('brandName')
            ]);
        }
    }

}
