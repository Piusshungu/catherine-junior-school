<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function schoolFeeForm()
    {
        return view('school-fee-payment');
    }
}
