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

           ->orderBy('payment.created_at', 'DESC')->get(['students.first_name', 'students.last_name', 'payment.*']),
           
           'students' => Student::orderBy('first_name')->get(),
           
        ]);
    }

    public function addNewPaymentRecord()
    {
        $paymentData = request()->validate([

            'payment_type' => 'required',
            'amount_paid' => 'required',
            'receipt_no' => 'required',
            'payment_date' => 'required',
            'student_id' => 'required'

        ]);

        $savePaymentDetails = Payment::create($paymentData);

        // if(isset(request()->students)){

        //     $savePaymentDetails->students()->attach(request()->students);
        // }

        return redirect('/payment')->with('success', 'Payment Records saved successfully');
    }
}
