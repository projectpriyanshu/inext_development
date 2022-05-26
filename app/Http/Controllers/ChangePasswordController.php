<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.setting.change_password.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'pwd' => 'required',
            'cnf_pwd' => 'same:pwd',
        ]);
        $user = Auth::user()->id;
        $user = User::where('id', $user)->first();
        $user->update([
            'password' => Hash::make($request->pwd),
        ]);

        // dd('Password change successfully.');
        return back()->with('message', 'Password Change Successful !');
    }
}