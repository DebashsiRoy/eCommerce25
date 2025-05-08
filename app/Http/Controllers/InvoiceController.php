<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    function salePage():view
    {
        return view('Admin.pages.sale-page');
    }


}
