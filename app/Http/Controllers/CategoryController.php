<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;
use Mockery\Exception;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function CategoryPage()
    {
        return view('Admin.pages.category-page');
    }

    public function ByCategoryPage()
    {
        return view('frontend.pages.product-by-category');
    }
    public function categoryForMenu()
    {
        return Category::all();
    }

    public function CategoryList(Request $request)
    {
        $user_id = Auth::id();
        return Category::where('user_id', $user_id)->get();
    }
    public function CategoryCreate(Request $request)
    {
        $userId = Auth::id();
        // Prepars File Name & path
        $img = $request->file('categoryImg');  // database insert field

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$userId}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
        $img_url = "uploads/category/{$img_name}";  //

        // Upload File
        $img->move(public_path('uploads/category/'), $img_name);
        // Resize Image



        return Category::create([
            'categoryName' => $request->input('categoryName'),
            'categoryImg' => $img_url,
            'user_id' => $userId,
        ]);
    }

    public function CategoryDelete(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = Auth::user()->id;

        // Retrieve the category record from the database
        $category = Category::where('user_id', $user_id)->where('id', $category_id)->first();

        if ($category && $category->categoryImg) {
            // Assuming the stored path is something like 'uploads/category/image.jpg'
            $filePath = public_path($category->categoryImg);

            // Check if the file exists before deleting
            if (File::exists($filePath)) {
                File::delete($filePath); // Delete the file
            }

            // Now, delete the category from the database
            return $category->delete();
        }
    }

    // This section is for fill form by old data
    function categoryByID(Request $request)
    {
        $user_id = Auth::id();
        $category_id=$request->input('id');
        return category::where('id',$category_id)->where('user_id',$user_id)->first();
    }


    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = Auth::user()->id;
        $category = Category::where('user_id', $user_id)->where('id', $category_id)->first();

        if ($request->hasFile('categoryImg')) {
            // Upload New File
            $img = $request->file('categoryImg');

            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$category_id}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
            $img_url = "uploads/category/{$img_name}";
            $img->move(public_path('uploads/category/'), $img_name);

             //Delete Old File
//            $filePath = public_path($request->input('file_path')); // Convert to absolute path
//
//            if (File::exists($filePath)) { // Check if file exists before deleting
//                File::delete($filePath);
//            }

            if ($category && $category->categoryImg) {
                // Assuming the stored path is something like 'uploads/category/image.jpg'
                $filePath = public_path($category->categoryImg);

                // Check if the file exists before deleting
                if (File::exists($filePath)) {
                    File::delete($filePath); // Delete the file
                }
            }

            // Update Category
            return Category::where('id', $category_id)->where('user_id', $user_id)->update([
                'categoryName' => $request->input('categoryName'),
                'categoryImg' => $img_url,
            ]);
        } else {
            // Only update category name if no file is uploaded
            return Category::where('id', $category_id)->where('user_id', $user_id)->update([
                'categoryName' => $request->input('categoryName')
            ]);
        }
    }


}
