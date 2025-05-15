<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function success(Request $request)
    {
        $invoiceId = $request->query('invoice_id');
        $invoice = Invoice::find($invoiceId);
        if ($invoice) {
            $invoice->payment_status = 'Paid';
            $invoice->save();
        }

        return view('payment.success', compact('invoice'));
    }

    public function cancel(Request $request)
    {
        $invoiceId = $request->query('invoice_id');
        $invoice = Invoice::find($invoiceId);
        if ($invoice) {
            $invoice->payment_status = 'Cancelled';
            $invoice->save();
        }

        return view('payment.cancel', compact('invoice'));
    }

}
