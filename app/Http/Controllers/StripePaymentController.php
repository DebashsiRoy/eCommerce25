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
            $invoice->payment_status = 'Success';
            $invoice->save();
        }

        return 1;
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
