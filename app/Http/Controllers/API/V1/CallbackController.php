<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

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

        if ($status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO set transaction status on your database to 'challenge'
                // and response with 200 OK
                Mail::to('adam2802002@gmail.com')->send(new TestMail('challenge'));
            } else if ($fraud == 'accept') {
                // TODO set transaction status on your database to 'success'
                // and response with 200 OK
                Mail::to('adam2802002@gmail.com')->send(new TestMail('accept'));
            }
        } else if ($status == 'settlement') {
            // TODO set transaction status on your database to 'success'
            // and response with 200 OK
            Mail::to('adam2802002@gmail.com')->send(new TestMail('settlement'));
        } else if (
            $status == 'cancel' ||
            $status == 'deny' ||
            $status == 'expire'
        ) {
            // TODO set transaction status on your database to 'failure'
            // and response with 200 OK
            Mail::to('adam2802002@gmail.com')->send(new TestMail('failure'));
        } else if ($status == 'pending') {
            // TODO set transaction status on your database to 'pending' / waiting payment
            // and response with 200 OK
            Mail::to('adam2802002@gmail.com')->send(new TestMail('pending'));
        }
    }
}
