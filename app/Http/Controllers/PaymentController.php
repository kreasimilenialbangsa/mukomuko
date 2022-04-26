<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Admin\Ziswaf;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;
use Xendit\EWallets;
use Xendit\VirtualAccounts;
use Xendit\Xendit;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->session()->get('donate')['type'];

        $donate = $type::find($request->session()->get('donate')['type_id']);

        return view('pages.payment.index')
            ->with('donate', $donate);  
    }

    public function detail(Request $request)
    {
        $paymentUrl = $this->midtrans('TESTZISWAF', 12000, 1);
        // $paymentUrl = $this->xenditEWallet('TESTZISWAF', 12000, 1);
        // $paymentUrl = $this->xenditVA();

        dd($paymentUrl);

        return view('pages.payment.detail-payment');
    }

    public function midtrans($type, $totalDonate, $userID, $message = null)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $orderID = $type . time();

        $midtrans = array(
            'transaction_details' => array(
                'order_id' => $orderID,
                'gross_amount' => (int) $totalDonate,
            ),
            'credit_card' => array(
                'secure' => true
            ),
            'item_details' => array(array(
                "id" => 2,
                "price" => 3000,
                "quantity" => 4,
                "name" => $type
            ),),
            'customer_details' => array(
                'first_name' => 'Bima Sakti',
                'email' => 'adam14113@gmail.com',
                'phone' => '+628111222333',
            ),
            'enabled_payments' => array('shopeepay'),
            'vtweb' => array()
        );

        $paymentUrl = Snap::getSnapUrl($midtrans);

        Mail::to('adam2802002@gmail.com')->send(new TestMail($paymentUrl));

        $data = [
            'order_id' => $orderID,
            'type' => $type,
            'type_id' => 1,
            'user_id' => 2,
            'name' => 'Bima Sakti',
            'email' => 'adam14113@gmail.com',
            'phone' => '+628111222333',
            'message' => $message,
            'total_donate' => $totalDonate,
            'is_anonim' => false,
        ];

        Transaction::create($data);

        return $paymentUrl;
    }

    public function xenditEWallet($type, $totalDonate, $userID, $message = null)
    {
        Xendit::setApiKey(env('XENDIT_KEY'));

        $orderID = $type . time();

        $ewalletChargeParams = [
            'reference_id' => $orderID,
            "name" => "Steve Wozniak",
            'currency' => 'IDR',
            'amount' => $totalDonate,
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_DANA',
            "expiration_date" => Carbon::now()->addMinutes(4)->subSeconds(30),
            'channel_properties' => [
                "mobile_number" => "+6285157906624",
                'success_redirect_url' => 'http://fd2c-139-228-135-89.ngrok.io',
                'failure_redirect_url' => 'http://fd2c-139-228-135-89.ngrok.io',
            ],
            'basket' => array(
                array(
                    "reference_id" => '1',
                    "name" => $type,
                    "category" => $type,
                    'currency' => 'IDR',
                    "price" => $totalDonate,
                    "quantity" => 1,
                    "type" => $type,
                ),
            ),
            'metadata' => [
                'branch_code' => 'tree_branch'
            ]
        ];

        $createEWalletCharge = EWallets::createEWalletCharge($ewalletChargeParams);

        Mail::to('adam2802002@gmail.com')->send(new TestMail($createEWalletCharge['actions']['desktop_web_checkout_url']));

        $data = [
            'order_id' => $orderID,
            'type' => $type,
            'type_id' => 1,
            'user_id' => 3,
            'name' => "Steve Wozniak",
            'email' => 'adam14113@gmail.com',
            'phone' => "+6285157906624",
            'message' => $message,
            'total_donate' => $totalDonate,
            'is_anonim' => false,
        ];

        Transaction::create($data);

        return $createEWalletCharge;
    }

    // public function xenditVA()
    // {
    //     Xendit::setApiKey(env('XENDIT_KEY'));

    //     $params = [
    //         "external_id" => 'TEST' . time(),
    //         "bank_code" => "MANDIRI",
    //         "name" => "Steve Wozniak",
    //         "is_single_use" => true,
    //         "is_closed" => true,
    //         "expected_amount" => 12000,
    //         "suggested_amount" => 12000,
    //         "expiration_date" => Carbon::now()->addMinutes(4)->subSeconds(30),
    //     ];

    //     $createVA = VirtualAccounts::create($params);
    //     return $createVA;
    // }
}
