<?php

namespace App\Http\Controllers;

class CustomInvoiceController extends Controller
{
    public function index()
    {
        return view('admin.operation.custom_invoice.index');
    }
}
