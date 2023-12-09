<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function getAddToCart($product_id){
        $product = Product::find($product_id);
        Cart::add(['id' => $product_id, 'name' => $product->product_name, 'qty' => 1, 'price' => $product->product_price,
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

        return view('Main.checkout');
    }
}
