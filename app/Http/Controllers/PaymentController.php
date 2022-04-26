<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Admin\Ziswaf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;

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
        $paymentUrl = $this->midtrans();

        dd($paymentUrl);

        return view('pages.payment.detail-payment');
    }

    public function midtrans()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = array(
            'transaction_details' => array(
                'order_id' => 'TEST' . time(),
                'gross_amount' => (int) 12000,
            ),
            'credit_card' => array(
                'secure' => true
            ),
            'item_details' => array(array(
                "id" => 2,
                "price" => 3000,
                "quantity" => 4,
                "name" => 'Bakwan'
            ),),
            'customer_details' => array(
                'first_name' => 'Bima Sakti',
                'email' => 'adam14113@gmail.com',
                'phone' => '08111222333',
            ),
            'enabled_payments' => array('shopeepay'),
            'vtweb' => array()
        );

        $paymentUrl = Snap::getSnapUrl($midtrans);

        Mail::to('adam2802002@gmail.com')->send(new TestMail($paymentUrl));

        return $paymentUrl;
    }
}
