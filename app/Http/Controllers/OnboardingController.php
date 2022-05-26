<?php

namespace App\Http\Controllers;

use App\Models\ClientLead;
use Illuminate\Http\Request;
use Mail;
use Session;

class OnboardingController extends Controller
{
    public function index()
    {
        $lead = ClientLead::orderBy('created_at')->get();
        return view('admin.client_onboarding.index')->with(['lead' => $lead]);
    }

    public function add(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile_no;
        $type = $request->type;
        if ($request->docs) {
            $docs = implode(',', $request->docs);
        } else {
            $docs = array();
        }

        if ($request->id) {
            // return "update";
            $data = array(
                "client_name" => $name,
                "mobile" => $mobile,
                "email" => $email,
                "email_sent_date" => date('Y-m-d'),
                "docs" => $docs,
                "status" => 'Negotiate',
            );
            ClientLead::where('id', $request->id)->update($data);
        } else {
            $lead = new ClientLead;
            $lead->client_name = $name;
            $lead->mobile = $mobile;
            $lead->email = $email;
            $lead->email_sent_date = date('Y-m-d');
            $lead->docs = $docs;
            $lead->status = 'Prospect';
            $lead->save();
            try {
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'docs' => $docs,
                );
                Mail::send('mailtemplate/onboarding', $data, function ($messages) use ($data) {
                    $messages->to($data['email'], 'Inext Onboarding')->subject('Confirmation for documnet submission!');
                    $messages->from(env("MAIL_FROM_ADDRESS", "project.test8112@gmail.com"), 'Inext Onboarding Registration!');
                });
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        Session::flash('success', 'Added successfully!');
        return redirect()->back();

    }

    public function sendOnboardingMail(Request $request)
    {
        $id = $request->id;
        $lead = ClientLead::where('id', $id)->first();
        if ($lead) {
            return response()->json(array('status' => true, 'data' => $lead));
        } else {
            return response()->json(array('status' => false, 'message' => 'No data found!'));
        }
    }

}
