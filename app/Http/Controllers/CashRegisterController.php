<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function index(){
        return view('admin.outbound.cash_register.index');
    }
}
