<?php

namespace App\Http\Controllers\API\V1;

use App\Mail\TestMail;
use App\Models\Admin\Donate;
use App\Models\Admin\Ziswaf;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;
use Midtrans\Snap;
use Xendit\EWallets;
use Xendit\VirtualAccounts;
use Xendit\Xendit;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function paymentProcess(Request $request)
    {
        $input = [
            'type' => $request->type== 'ziswaf' ? '\App\Models\Admin\Ziswaf' : '\App\Models\Admin\Program',
            'type_code' => $request->type == 'ziswaf' ? 'ZISWAF-' : 'PROGRAM-',
            'type_id' => $request->type_id,
            'totalDonate' => $request->nominal,
            'userId' => $request->user_id,
            'userName' => $request->name,
            'userEmail' => $request->email,
            'userPhone' => $request->phone,
            'is_anonim' => $request->anonym == true ? 1 : 0 ,
            'message' => !empty($request->message) ? $request->message : null,
            'paymentChannel' => $request->channel
        ];  

        if($input['paymentChannel'] == 'ID_DANA' || $input['paymentChannel'] == 'ID_OVO' || $input['paymentChannel'] == 'ID_LINKAJA') {       
            $data = $this->_xenditEWallet($input);
        } else {
            $data = $this->_midtrans($input);
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    private function _midtrans($input)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $orderID = $input['type_code'] . time();

        $type = $input['type'];
        $donate = $type::find($input['type_id']);

        $midtrans = array(
            'transaction_details' => array(
                'order_id' => $orderID,
                'gross_amount' => (int) $input['totalDonate'],
            ),
            // "callbacks" => array(
            //     "finish" => "https://to koecommerce.com/my_custom_finish/?name=Customer01"
            // ),
            // "expiry" => array(
            //     "start_time" => "2020-04-13 18:11:08 +0700",
            //     "unit" => "minutes",
            //     "duration" => 180
            // ),
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
                'first_name' => $input['is_anonim'] == 0 ? $input['userName'] : 'Hamba Allah',
                'email' => $input['userEmail'],
                'phone' => $input['userPhone'],
            ),
            'enabled_payments' => array($input['paymentChannel']),
            'callbacks' => array(
                'finish' => 'nukoin://lazisnumukomuko.id/payment/success'
            ),
            'vtweb' => array()
        );
        

        if($input['paymentChannel'] == 'gopay') {
            $midtrans += array("gopay" => array(
                'enable_callback' => true,
                'callback_url' => 'nukoin://lazisnumukomuko.id/payment/success'
            ));
        }

        $transaction = Snap::createTransaction($midtrans);

        // Mail::to('adam2802002@gmail.com')->send(new TestMail($paymentUrl));

        $data = [
            'order_id' => $orderID,
            'order_token' => $transaction->token,
            'order_url' => $transaction->redirect_url,
            'type' => $type,
            'type_id' => $input['type_id'],
            'user_id' => $input['userId'],
            'name' => $input['userName'],
            'email' => $input['userEmail'],
            'phone' => $input['userPhone'],
            'message' => $input['message'],
            'total_donate' => $input['totalDonate'],
            'date_donate' => date('Y-m-d H:i:s'),
            'is_anonim' => $input['is_anonim'],
            'location_id' => 0,
            'is_confirm' => 0,
            'is_payment' => 1,
        ];

        Donate::create($data);

        $response = [
            'order_id' => $orderID,
            'order_token' => $transaction->token,
            'order_url' => $transaction->redirect_url
        ];

        return $response;
    }

    private function _xenditEWallet($input)
    {
        Xendit::setApiKey(env('XENDIT_KEY'));

        $orderID = $input['type'] . time();

        $type = session()->get('donate')['type'];
        $donate = $type::find(session()->get('donate')['type_id']);

        $ewalletChargeParams = [
            'reference_id' => $orderID,
            'name' => $input['is_anonim'] == 0 ? $input['userName'] : 'Hamba Allah',
            'currency' => 'IDR',
            'amount' => (int) $input['totalDonate'],
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_code' => $input['paymentChannel'],
            "expiration_date" => Carbon::now()->addMinutes(1),
            'channel_properties' => [
                "mobile_number" => '+62'.$input['userPhone'],
                'success_redirect_url' => route('payment.detail', $orderID),
                'failure_redirect_url' => route('payment.detail', $orderID)
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
            'order_url' => $createEWalletCharge['actions']['desktop_web_checkout_url'],
            'type' => $type,
            'type_id' => $input['type_id'],
            'user_id' => $input['userId'],
            'name' => $input['userName'],
            'email' => $input['userEmail'],
            'phone' => $input['userPhone'],
            'message' => $input['message'],
            'total_donate' => $input['totalDonate'],
            'date_donate' => date('Y-m-d H:i:s'),
            'is_anonim' => $input['is_anonim'],
            'location_id' => 0,
            'is_confirm' => 0,
            'is_payment' => 2,
        ];

        Donate::create($data);

        return $orderID;
    }
}
