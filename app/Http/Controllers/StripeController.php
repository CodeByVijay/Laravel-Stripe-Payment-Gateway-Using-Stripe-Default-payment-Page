<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function payment(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'inr',
                            'product_data' => [
                                'name' => $request->pname,
                            ],
                            'unit_amount' => $request->amount * 100, // Amount in cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => true,
                'success_url' => route('checkout.success') . '?payment_intent={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel') . '?payment_intent={CHECKOUT_SESSION_ID}',
            ]);
            // echo "<pre>";
            // print_r($session);
            // die();
            // return redirect($session->url);
            // $successUrl = str_replace('{CHECKOUT_SESSION_ID}', $session->id, $session->url);
            // $cancelUrl = str_replace('{CHECKOUT_SESSION_ID}', $session->id, $session->url);

            return redirect($session->url);
        } catch (\Exception $e) {
            dd($e->getMessage());
            // return back()->withError($e->getMessage());
        }
    }

    public function success(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Retrieve the payment_intent ID from the query parameters
            $paymentIntentId = $request->query('payment_intent');

            // Retrieve the payment intent object from Stripe
            $session = Session::retrieve($paymentIntentId);
            $paymentIntent = PaymentIntent::retrieve($session->payment_intent);

            //    echo "<pre>";
            //     print_r($paymentIntent->charges->data[0]->receipt_url);
            //     die();
            return redirect($paymentIntent->charges->data[0]->receipt_url);
        } catch (\Exception $e) {
            dd($e->getMessage());
            // Handle any errors that may occur during payment intent retrieval
        }
    }
    public function cancel(Request $request)
    {
        echo "Payment Cancelled";

    }
}
