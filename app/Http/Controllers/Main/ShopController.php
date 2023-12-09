<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function getMainPage(){
        $data['randomProducts'] = Product::inRandomOrder()->take(8)->get();
        $data['onghut'] = Product::where('product_type', 1)->count();
        $data['newProducts'] = Product::orderBy('product_id', 'desc')->take(8)->get();
        return view('Main.index', $data);
    }

    public function getShopProduct(){
        $data['productList'] = Product::orderBy('product_id', 'desc')->paginate(1);
        return view('Main.shop', $data);
    }

    public function getProductInformation($product_slug){
        $data['product'] = Product::where('product_slug', $product_slug)->first();
        $data['randomProducts'] = Product::inRandomOrder()->take(5)->get();
        $product = Product::where('product_slug', $product_slug)->take(1)->get();
        $id = $product->get(0)->product_id;
        $data['comments'] = Comment::where('com_product', $id)->get();
        $data['commentCounts'] = Comment::where('com_product', $id)->count();
        return view('Main.shopdetail', $data);
    }

    public function getProductByCategory($category_id){
        $data['productListByCategory'] = Product::where('product_type', $category_id)->orderBy('product_id', 'desc')->paginate(1);
        $data['categoryName'] = Category::find($category_id);
        return view('Main.shopbycategory', $data);
    }

    public function getSearchResult(Request $request){
        $result = str_replace(' ', '%', $request->result);
        $data['productName'] = $request->result;
        $data['productFounds'] = Product::where('product_name', 'like', '%' . $result . '%')->paginate(1);
        $data['productCount'] = Product::where('product_name', 'like', '%' . $result . '%')->count();

        return view('Main.shopbysearch', $data);
    }



    // Post

    public function postProductComment(Request $request, $product_slug){

        $comment = new Comment();
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->comment;
        $product = Product::where('product_slug', $product_slug)->take(1)->get();
        $comment->com_product = $product->get(0)->product_id; // Get First Item From Collection
        $comment->save();

        return redirect()->back()->with(['comment_success' => 'Bình Luận Thành Công!!!']);
    }
}
