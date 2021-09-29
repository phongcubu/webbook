<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Models\CatePost;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();


        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;

        // them vao cart
        Cart::add($data);
        Cart::setGlobalTax(1);
        
        return Redirect::to('show-cart');
        
        
    }

    public function show_cart()
    {

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$category_post);
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('show-cart');

    }
    public function update_cart_quantity(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->cart_quantity;
        Cart::update($rowId,$qty);

        return Redirect::to('show-cart');
    }
}
?>