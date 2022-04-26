<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Transaction;
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

        $transaction = Transaction::where('order_id', $order_id)->first();

        if ($status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO set transaction status on your database to 'challenge'
                // and response with 200 OK
                Mail::to('adam2802002@gmail.com')->send(new TestMail('challenge'));
            } else if ($fraud == 'accept') {
                // TODO set transaction status on your database to 'success'
                // and response with 200 OK
                $transaction->is_confirm = 1;
                $transaction->save();

                Mail::to('adam2802002@gmail.com')->send(new TestMail('accept'));
            }
        } else if ($status == 'settlement') {
            // TODO set transaction status on your database to 'success'
            // and response with 200 OK
            $transaction->is_confirm = 1;
            $transaction->save();

            Mail::to('adam2802002@gmail.com')->send(new TestMail('settlement'));
        } else if (
            $status == 'cancel' ||
            $status == 'deny' ||
            $status == 'expire'
        ) {
            // TODO set transaction status on your database to 'failure'
            // and response with 200 OK
            $transaction->is_confirm = 2;
            $transaction->save();

            Mail::to('adam2802002@gmail.com')->send(new TestMail('failure'));
        } else if ($status == 'pending') {
            // TODO set transaction status on your database to 'pending' / waiting payment
            // and response with 200 OK
            Mail::to('adam2802002@gmail.com')->send(new TestMail('pending'));
        }
    }

    public function xenditCallback(Request $request)
    {
        $transaction = Transaction::where('order_id', $request->data['reference_id'])->first(); //$request->data['reference_id']);

        if ($request->data['status'] == 'SUCCEEDED') {

            $transaction->is_confirm = 1;
            $transaction->save();

            Mail::to('adam2802002@gmail.com')->send(new TestMail($request->data['reference_id']));
        } else if ($request->data['status'] == 'PENDING') {
            Mail::to('adam2802002@gmail.com')->send(new TestMail($request->data['status']));
        } else {
            $transaction->is_confirm = 2;
            $transaction->save();

            Mail::to('adam2802002@gmail.com')->send(new TestMail($request->data['status']));
        }

        // return $request;
    }
}
