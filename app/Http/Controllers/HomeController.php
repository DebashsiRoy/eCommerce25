<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function accountPage()
    {
        return view('frontend.pages.account-page');
    }

    public function index()
    {
        return view('home');
    }
    public function productDetails()
    {
        return view('frontend.pages.details-page');
    }

}
