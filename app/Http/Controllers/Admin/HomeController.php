<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome(){
        $data['commentList'] = Comment::orderBy('updated_at', 'desc')->take(10)->get();
        $data['invoiceList'] = Invoice::orderBy('updated_at', 'desc')->take(10)->get();
        $data['orderList'] = Order::all();
        $data['userCount'] = User::all()->count();
        $data['productCount'] = Product::all()->count();
        $data['categoryCount'] = Category::all()->count();
        $data['commentCount'] = Comment::all()->count();
        $data['invoiceCount'] = Invoice::all()->count();
        $data['pendingInvoiceCount'] = Invoice::where('invoice_status', 'WAIT')->get()->count();

        $doneInvoice = Invoice::where('invoice_status', 'DONE')->get();
        $data['revenue'] = 0;

        foreach($doneInvoice as $invoice){
            $data['revenue'] += $invoice->invoice_total_money;
        }

        return view('Admin.index', $data);
    }

    public function getLogOut(){
        Auth::logout();
        return redirect('/login');
    }
}
