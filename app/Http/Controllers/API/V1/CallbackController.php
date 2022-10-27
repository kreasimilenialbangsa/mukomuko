<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\FCM;
use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Admin\Donate;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Xendit\EWallets;
use Xendit\VirtualAccounts;
use Xendit\Xendit;

class CallbackController extends Controller
{
    public function midtransCallback()
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        $transaction = Donate::where('order_id', $order_id)->first();
        $user = User::whereId($transaction->user_id)->first();

        if ($status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO set transaction status on your database to 'challenge'
                // and response with 200 OK
                // Mail::to('batas1204@gmail.com')->send(new TestMail('challenge'));
            } else if ($fraud == 'accept') {
                // TODO set transaction status on your database to 'success'
                // and response with 200 OK
                $transaction->is_confirm = 1;
                $transaction->save();

                // Mail::to('batas1204@gmail.com')->send(new TestMail('accept'));
            }
        } else if ($status == 'settlement') {
            // TODO set transaction status on your database to 'success'
            // and response with 200 OK
            $transaction->is_confirm = 1;
            $transaction->save();

            if(!empty($user->fcm_token)) {
                FCM::direct($user->fcm_token, [
                    'title' => '❤️ Donasimu Rp '. number_format($transaction->total_donate,0,",",".") . ' berhasil',
                    'body' => 'Terima kasih atas donasimu semoga menjadi pembuka pintu rezeki dan keberkahan untukmu 😇',
                    'order_id' => $order_id,
                    'status' => 'success'
                ]);
            }

            // Mail::to('batas1204@gmail.com')->send(new TestMail('settlement'));
        } else if ($status == 'cancel' || $status == 'deny' || $status == 'expire') {
            // TODO set transaction status on your database to 'failure'
            // and response with 200 OK
            $transaction->is_confirm = 2;
            $transaction->save();

            // if(!empty($user->fcm_token)) {
            //     FCM::direct($user->fcm_token, [
            //         'title' => '💔 Donasimu Rp '. number_format($transaction->total_donate,0,",",".") . ' gagal',
            //         'body' => 'Gagal pembayaran ' . $type->title,
            //         'order_id' => $order_id,
            //         'status' => 'failed'
            //     ]);
            // }

            // Mail::to('batas1204@gmail.com')->send(new TestMail('failure'));
        } else if ($status == 'pending') {
            // TODO set transaction status on your database to 'pending' / waiting payment
            // and response with 200 OK
            // Mail::to('batas1204@gmail.com')->send(new TestMail('pending'));
        }
    }

    public function xenditCallback(Request $request)
    {
        // return $request;

        $transaction = Donate::where('order_id', $request->data['reference_id'])->first(); //$request->data['reference_id']);

        if (empty($transaction)) {
            Mail::to('batas1204@gmail.com')->send(new TestMail($request->data['reference_id']));

            return response()->json([
                'message' => 'Donate Not Found',
                'data' => $request->data,
            ]);
        }

        if ($request->data['status'] == 'SUCCEEDED') {

            $transaction->is_confirm = 1;
            $transaction->save();

            Mail::to('batas1204@gmail.com')->send(new TestMail($request->data['reference_id']));
        } else if ($request->data['status'] == 'PENDING') {
            Mail::to('batas1204@gmail.com')->send(new TestMail($request->data['status']));
        } else {
            $transaction->is_confirm = 2;
            $transaction->save();

            Mail::to('batas1204@gmail.com')->send(new TestMail($request->data['status']));
        }

        return response()->json([
            'message' => 'Success',
            'data' => $request->data,
        ]);
    }
}
