<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\ProductCarts;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class invoiceController extends Controller
{
    function InvoiceCreate(Request $request)
    {
        DB::beginTransaction();
        try {
            // User Details
            $user_id = Auth::id();
            $user_email = Auth::user()->email;

            // Transaction Details
            $tran_id=uniqid();
            $delivery_status='Pending';
            $payment_status='Pending';

            // Customer details
            // Customer details
            $profile = CustomerProfile::where('user_id','=', $user_id)->first();

            if (!$profile) {
                return ResponseHelper::Out('error', 'Customer profile not found.', 404);
            }

            $cus_details = "Name: $profile->cus_name, Address: $profile->cus_add, City: $profile->cus_city, Phone: $profile->cus_phone";
            $ship_details = "Name: $profile->ship_name, Address: $profile->ship_add, City: $profile->ship_city, Phone: $profile->ship_phone";


            // Payable Calculation
            $total=0;
            $cartList=ProductCarts::where('user_id','=', $user_id)->get();
            foreach ($cartList as $cartItem)
            {
                $total=$total+$cartItem->price;
            }

            // Vat Calculation
            $vat=($total*5)/100;
            $payable=$total+$vat;

            $invoice = Invoice::create([
                'total' => $total,
                'vat' => $vat,
                'payable' => $payable,
                'cus_details' => $cus_details,
                'ship_details' => $ship_details,
                'tran_details' => $tran_id,
                'delivery_status' => $delivery_status,
                'payment_status' => $payment_status,
                'user_id' => $user_id,
            ]);

            $invoiceID=$invoice->id;

            // Save products and prepare Stripe line items
            $lineItems = [];
            foreach ($cartList as $cart) {
                InvoiceProduct::create([
                    'invoice_id' => $invoiceID,
                    'product_id' => $cart->product_id,
                    'user_id' => $user_id,
                    'qty' => $cart->qty,
                    'sale_price' => $cart->price,
                ]);

                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => intval($cart->price * 100),
                        'product_data' => [
                            'name' => 'Product #' . $cart->product_id,
                        ],
                    ],
                    'quantity' => $cart->qty,
                ];
            }

            // Add VAT line item
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => intval($vat * 100),
                    'product_data' => [
                        'name' => 'VAT (5%)',
                    ],
                ],
                'quantity' => 1,
            ];

            // Stripe checkout session
            Stripe::setApiKey(config('services.stripe.secret'));

            $session = StripeSession::create([
                'payment_method_types' => ['card', 'amazon_pay', 'cashapp', 'afterpay_clearpay', 'affirm'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('stripe.success', ['invoice_id' => $invoice->id]),
                'cancel_url' => route('stripe.cancel', ['invoice_id' => $invoice->id]),
                'customer_email' => $user_email,
                'metadata' => [
                    'invoice_id' => $invoice->id,
                    'user_id' => $user_id,
                ],
            ]);

            DB::commit();

            return ResponseHelper::Out('success', [
                [
                    'payment_url' => $session->url,
                    'payable' => $payable,
                    'vat' => $vat,
                    'total' => $total,
                ]
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseHelper::Out('fail', $e->getMessage(), 500);
        }
    }

    function InvoiceList(Request $request)
    {
        $user_id = Auth::id();
        return Invoice::where('user_id','=', $user_id)->get();
    }

    function InvoiceProductList(Request $request)
    {
        $user_id = Auth::id();
        $invoice_id=$request->invoice_id;
        return InvoiceProduct::where(['user_id' => $user_id, 'invoice_id' => $invoice_id])->with('product')->get();
    }


}















