<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment', [

           'payments' => Student::join('payment', 'payment.student_id', '=', 'students.id')

           ->orderBy('payment.created_at')->get(['students.first_name', 'students.last_name', 'payment.*']),
           
           
        ]);
    }
}
