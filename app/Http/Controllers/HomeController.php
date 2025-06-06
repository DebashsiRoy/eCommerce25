<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function productDetails()
    {
        return view('frontend.pages.details-page');
    }
    public function loginPage()
    {
        return view('frontend.pages.login-page');
    }
}
