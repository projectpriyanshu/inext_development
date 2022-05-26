<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingBillController extends Controller
{
    public function index(){
        return view('admin.operation.shipping_bill.index');
    }
}
