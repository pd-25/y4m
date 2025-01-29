<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Ordernew;
use App\Models\Donate;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->product_price
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {

                    // Save order record in db
                    $order = new Ordernew();
                    $order->order_id      = $response['id'];
                    $order->product_id    = $request->product_id;
                    $order->product_price = $request->product_price;
                    $order->product_size  = $request->Size;
                    $order->product_color = $request->Color;
                    $order->product_qty   = $request->qty;
                    $order->status        = 'pending';
                    $order->save();

                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //dd($response->id);

            Ordernew::where('order_id', $response['id'])
                ->update([
                    'status' => 'payment_success'
                ]);

            // return redirect()
            //     ->route('createTransaction')
            //     ->with('success', 'Transaction complete.');

            return redirect()
                ->route('successTransactionMsg')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function successTransactionMsg(Request $request)
    {
        return view('success-transaction');
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        // return redirect()
        //     ->route('createTransaction')
        //     ->with('error', $response['message'] ?? 'You have canceled the transaction.');
        return redirect()
            ->route('cancelTransactionMsg')
            ->with('error', 'Transaction complete.');
    }

    public function cancelTransactionMsg(Request $request)
    {
        return view('cancel-transaction');
    }

    public function donatenowpost(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('donatenowsuccess'),
                "cancel_url" => route('donatenowcancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->amount
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {

                    // Save order record in db
                    $donate = new Donate();
                    $donate->order_id = $response['id'];
                    $donate->name    = $request->name;
                    $donate->email   = $request->email;
                    $donate->amount  = $request->amount;
                    $donate->status  = 'pending';
                    $donate->save();

                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('donatenow')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('donatenow')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function donatenowcancel(Request $request)
    {
        return view('cancel-transaction-donate-now');
    }

    public function donatenowsuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //dd($response->id);

            Donate::where('order_id', $response['id'])
                ->update([
                    'status' => 'success'
                ]);
        }

        return view('success-transaction-donate-now');
    }
}
