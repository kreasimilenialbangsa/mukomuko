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

    public function process_payment(Request $request)
    {
        $input = [
            'type' => $request->session()->get('donate')['type'] == '\App\Models\Admin\Ziswaf' ? 'ZISWAF-' : 'PROGRAM-',
            'type_id' => $request->session()->get('donate')['type_id'],
            'totalDonate' => $request->session()->get('donate')['nominal'],
            'userId' => isset($request->session()->get('user')['id']) ? $request->session()->get('user')['id'] : 0,
            'userName' => isset($request->session()->get('user')['name']) ? $request->session()->get('user')['name'] : $request->name,
            'userEmail' => isset($request->session()->get('user')['email']) ? $request->session()->get('user')['email'] : $request->email,
            'userPhone' => isset($request->session()->get('user')['phone']) ? $request->session()->get('user')['phone'] : $request->phone,
            'is_anonim' => isset($request->is_anonim) ? 1 : 0,
            'message' => !empty($request->message) ? $request->message : '',
            'paymentChannel' => $request->paymentChannel
        ];

        // $url = $this->_midtrans($input);
        $url = $this->_xenditEWallet($input);


        // if($input['paymentChannel'] == '') {
        //     $url = $this->_midtrans($input);
        //     } else {
        //     $url = $this->_xenditEWallet($input);
        // }

        return redirect($url);
    }

    private function _midtrans($input)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $orderID = $input['type'] . time();

        $type = session()->get('donate')['type'];
        $donate = $type::find(session()->get('donate')['type_id']);

        $midtrans = array(
            'transaction_details' => array(
                'order_id' => $orderID,
                'gross_amount' => (int) $input['totalDonate'],
            ),
            'credit_card' => array(
                'secure' => true
            ),
            'item_details' => array(array(
                "id" => $input['type_id'],
                "price" => $input['totalDonate'],
                "quantity" => 1,
                "name" => $donate->title
            ),),
            'customer_details' => array(
                'first_name' => $input['is_anonim'] == 1 ? $input['userName'] : 'Hamba Allah',
                'email' => $input['userEmail'],
                'phone' => $input['userPhone'],
            ),
            'enabled_payments' => array('shopeepay'),
            'vtweb' => array()
        );

        $paymentUrl = Snap::getSnapUrl($midtrans);

        // Mail::to('adam2802002@gmail.com')->send(new TestMail($paymentUrl));

        $data = [
            'order_id' => $orderID,
            'type' => $type,
            'type_id' => $input['type_id'],
            'user_id' => $input['userId'],
            'name' => $input['userName'],
            'email' => $input['userEmail'],
            'phone' => $input['userPhone'],
            'message' => $input['message'],
            'total_donate' => $input['totalDonate'],
            'is_anonim' => $input['is_anonim'],
        ];

        Transaction::create($data);

        return $paymentUrl;
    }

    private function _xenditEWallet($input)
    {
        Xendit::setApiKey(env('XENDIT_KEY'));

        $orderID = $input['type'] . time();

        $type = session()->get('donate')['type'];
        $donate = $type::find(session()->get('donate')['type_id']);

        $ewalletChargeParams = [
            'reference_id' => $orderID,
            "name" => $input['userName'],
            'currency' => 'IDR',
            'amount' => (int) $input['totalDonate'],
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => 'ID_DANA',
            "expiration_date" => Carbon::now()->addMinutes(4)->subSeconds(30),
            'channel_properties' => [
                "mobile_number" => '+62' . $input['userPhone'],
                'success_redirect_url' => 'http://bba8-139-228-135-89.ngrok.io',
                'failure_redirect_url' => 'http://bba8-139-228-135-89.ngrok.io',
            ],
            'basket' => array(
                array(
                    "reference_id" => $input['type_id'],
                    "name" => $donate->title,
                    "category" => $input['type'],
                    'currency' => 'IDR',
                    "price" => (int) $input['totalDonate'],
                    "quantity" => 1,
                    "type" => $input['type'],
                ),
            ),
            'metadata' => [
                'branch_code' => 'tree_branch'
            ]
        ];

        $createEWalletCharge = EWallets::createEWalletCharge($ewalletChargeParams);

        // Mail::to('adam2802002@gmail.com')->send(new TestMail($createEWalletCharge['actions']['desktop_web_checkout_url']));

        $data = [
            'order_id' => $orderID,
            'type' => $type,
            'type_id' => $input['type_id'],
            'user_id' => $input['userId'],
            'name' => $input['userName'],
            'email' => $input['userEmail'],
            'phone' => $input['userPhone'],
            'message' => $input['message'],
            'total_donate' => $input['totalDonate'],
            'is_anonim' => $input['is_anonim'],
        ];

        Transaction::create($data);

        return $createEWalletCharge['actions']['desktop_web_checkout_url'];
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
