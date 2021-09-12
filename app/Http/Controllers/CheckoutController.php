<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin-login')->send();
        }

    }
    public function login_checkout()
    {   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    //  đăng kí ngupi dùng
    public function add_customer(Request $request) {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] =md5( $request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('checkout');
     
    }
        //  đăng nhập người dùng người dùng
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $kq = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($kq)
        {
            Session::put('customer_id',$kq->customer_id);
            return Redirect::to('checkout');
        }
        else{
            return Redirect::to('login-checkout');

        }
       
       
    }
         //  đăng xuất người dùng
     public function logout_checkout()
     {
         Session::flush();
         return Redirect::to('login-checkout');
     }


    //  hien thi trang hiển thị điền thông tin thanh toán
    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    // lưu thông tin người dùng thanh toán
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $request->shipping_notes;
        
        $shipping_id  = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        
        return Redirect::to('payment');
    }
    //  trang thanh toán
      public function payment()
     {   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
     }

     public function order_payment_place(Request $request)
     {
        // payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lí';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // nhận order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lí';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        // oder_details chi tiết phần đặt hàng
        $content=Cart::content();
        foreach($content as $v_content){

            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            $order_d_id = DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method'] ==1)
        {
            echo ' thanh toán atm';
        }
        elseif($data['payment_method']==2)
        {
            cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }
        //return Redirect::to('payment');
     }
    public function manage_order( ){
        $this->AuthLogin();
        // lấy data từ bảng 
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderBy('tbl_order.order_id','desc')->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }
  
}
