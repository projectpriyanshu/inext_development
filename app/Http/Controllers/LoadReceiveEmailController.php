<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\emailnotification;

class LoadReceiveEmailController extends Controller
{
    public function index(){
        return view('admin.outbound.load_recieve_email.index');
    }

    public function store(Request $request){
        $email= $request->all();
        $rules = [
            'sender_smtp' => 'required',
            'sender_id' => 'required',
            'sender_email' => 'required',
            'sender_password' => 'required',
            'additional_cc' => 'required',
        ];
        $validation = Validator::make($email,$rules);
        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        }
      
        $emailnotification = new emailnotification();
        $emailnotification->id = $request->id;
        $emailnotification->sender_smtp = $request->sender_smtp;
        $emailnotification->sender_id = $request->sender_id;
        $emailnotification->sender_email = $request->sender_email;
        $emailnotification->checkbox = ($request->checkbox == 'on') ? '1' : '0';
        $emailnotification->smtp_port = $request->smtp_port;
        $emailnotification->sender_password = Hash::make('sender_password');
        $emailnotification->additional_cc = $request->additional_cc;
        $emailnotification->save();

        return redirect()->route('loadreceive.email.index')->with('success', 'email notification Details added Successfully!');
    
    }
}
