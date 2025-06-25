<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\ProductCarts;
use Auth;
use Illuminate\Http\Request;



class StripePaymentController extends Controller
{
    public function success(Request $request)
    {
        $invoiceId = $request->query('invoice_id');
        $invoice = Invoice::find($invoiceId);
        if ($invoice) {
            $invoice->payment_status = 'Success';
            $invoice->save();
            $user_id = Auth::id(); // ✅ get the current user
            ProductCarts::where('user_id', $user_id)->delete(); // ✅ clear the cart
        }


        return redirect('/')->with('success', 'Payment successful and cart cleared.');

    }

    public function cancel(Request $request)
    {
        $invoiceId = $request->query('invoice_id');
        $invoice = Invoice::find($invoiceId);
        if ($invoice) {
            $invoice->payment_status = 'Cancelled';
            $invoice->save();
        }

        return 1;
    }

}
