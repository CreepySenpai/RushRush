<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getInvoice(){
        $data['invoiceList'] = Invoice::all();
        return view('Admin.order', $data);
    }
}
