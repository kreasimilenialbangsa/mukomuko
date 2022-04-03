<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.payment.index');
    }

    public function detail(Request $request)
    {
        return view('pages.payment.detail-payment');
    }
}
