<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmailAwbnoController extends Controller
{
    public function index(){
        return view('admin.outbound.send_email_awbno.index');
    }
}
