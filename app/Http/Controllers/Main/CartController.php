<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function getAddToCart($product_id){
        $product = Product::find($product_id);
        Cart::add(['id' => $product_id, 'name' => $product->product_name, 'qty' => 1, 'price' => $product->product_price,
        'options' => ['img' => $product->product_image]]);
        return redirect('/cart/show')->with(['add_cart_success' => 'Sản Phẩm Đã Được Thêm Vào Giỏ Hàng!!!']);
    }

    public function getAddMultiToCart(Request $request){
        $product = Product::find($request->productId);
        Cart::add(['id' => $request->productId, 'name' => $product->product_name, 'qty' => $request->productCartCount, 'price' => $product->product_price,
        'options' => ['img' => $product->product_image]]);
        return redirect('/cart/show')->with(['add_cart_success' => 'Sản Phẩm Đã Được Thêm Vào Giỏ Hàng!!!']);
    }

    public function getShowCart(){
        $data['productInCart'] = Cart::content();
        $data['totalMoney'] = Cart::total();
        return view('Main.cart', $data);
    }

    public function getRemoveCart($cart_id){
        Cart::remove($cart_id);
        return redirect()->back()->with(['remove_cart_success' => 'Sản Phẩm Đã Được Xoá Khỏi Giỏ Hàng!!!']);
    }

    public function getDestroyCart(){
        Cart::destroy();
        return redirect()->back()->with(['destroy_cart_success' => 'Xoá Giỏ Hàng Thành Công!!!']);
    }

    public function getCheckout(){
        if(Cart::count() == 0){
            return redirect()->back()->with(['cart_empty' => "Không Có Sản Phẩm Nào Trong Giỏ Hàng!"]);
        }
        $data['productInCart'] = Cart::content();
        $data['totalMoney'] = Cart::total();
        return view('Main.checkout', $data);
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->productCount);
    }

    public function getOrder(){
        $data['invoiceList'] = Invoice::where('invoice_user_id', Auth::id())->get();
        $orderID = $data['invoiceList']->first()->getAttribute('invoice_id');
        $data['orderList'] = Order::where('order_code', 'like', '%' . $orderID . '%')->get();
        return view('Main.order', $data);
    }

    public function getDeleteOrder($invoice_id){
        Invoice::destroy($invoice_id);
        return redirect()->back()->with(['delete_order_success' => 'Đơn Hàng Đã Được Huỷ!!!']);
    }

    //Post

    public function postCheckout(CheckoutRequest $request){
        $productInCart = Cart::content();
        $tempStr = Str::random(12);
        $invoice = new Invoice();
        $invoice->invoice_id = $tempStr;
        $invoice->invoice_user_id = Auth::id();
        $invoice->invoice_user_phone = $request->userPhoneNumber;
        $invoice->invoice_user_address = $request->userAddress;
        $invoice->invoice_user_email = $request->userEmail;
        $invoice->invoice_status = "WAIT";
        $invoice->invoice_total_money = Cart::total();
        $invoice->invoice_total_product = Cart::count();
        $invoice->save();
        foreach($productInCart as $product){
            // dd($product->id . " : " . $product->name . " : " . $product->qty);

            $order = new Order();
            $order->order_code = $tempStr;
            $order->produce_id = $product->id;
            $order->produce_name = $product->name;
            $order->produce_qty = $product->qty;
            $order->save();
        }


        Cart::destroy();

        $data['invoiceList'] = Invoice::where('invoice_user_id', Auth::id())->get();
        // dd($invoice->invoice_user_id . " : " . $invoice->invoice_code . " : " . $invoice->invoice_user_phone . " : " . $invoice->invoice_user_address . " : " . $invoice->invoice_total_money . " : " . $invoice->invoice_total_product);
        return redirect('cart/order')->with(['order_success' => 'Đơn Hàng Đã Được Đặt Thành Công!!!', 'invoiceList' => $data['invoiceList']]);
    }
}
