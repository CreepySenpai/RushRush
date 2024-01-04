<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getInvoice(){
        $data['invoiceList'] = Invoice::all();
        $data['orderList'] = Order::all();
        return view('Admin.order', $data);
    }

    public function getDeleteInvoice($invoice_id){
        Invoice::destroy($invoice_id);
        return redirect()->back()->with(['delete_invoice_success' => 'Huỷ Đơn Hàng Thành Công!!!']);
    }

    public function getDoneInvoice($invoice_id){
        $invoice = Invoice::find($invoice_id);
        $invoice->invoice_status = "DONE";
        $invoice->save();

        $doneOrderList = Order::where('order_code', $invoice_id)->get();

        foreach($doneOrderList as $order){
            $productID = $order->getAttribute('produce_id');
            $orderQty = $order->getAttribute('produce_qty');
            $product = Product::find($productID);
            $product->product_count = $product->product_count - $orderQty;
            $product->save();
        }

        return redirect()->back()->with(['done_invoice_success' => 'Đơn Hàng Đang Được Vận Chuyển!!!']);
    }
}
