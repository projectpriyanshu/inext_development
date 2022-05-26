<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentSummaryController extends Controller
{
    public function index(){
        return view('admin.account.payment_summary.index');
    }
}
