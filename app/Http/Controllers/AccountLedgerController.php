<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountLedgerController extends Controller
{
    public function index(){
        return view('admin.account.account_ledger.index');
    }
}
