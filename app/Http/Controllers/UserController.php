<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function userDashboard()
    {
        return view('frontend.components.user-dashboard');
    }
    public function userProfileIndex()
    {
        return view('layouts.profile-page');
    }

    function accountDetails()
    {
        return view('frontend.components.account-details');
    }

    function userProfile(Request $request)
    {
        $email = Auth::user()->email;
        $user=User::where('email',$email)->first();

        return response()->json([
            'status'=>'success',
            'message'=>'Profile updated successfully',
            'data'=>$user
        ]);
    }

    function UpdateProfile(Request $request)
    {
        try {
            $email = Auth::user()->email;
            $name=$request->input('name');
            $email=$request->input('email');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            User::where('email',$email)->update([
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Profile updated successfully',
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'status'=>'fail',
                'message'=>'Profile is not updated',
            ],200);
        }
    }

}
