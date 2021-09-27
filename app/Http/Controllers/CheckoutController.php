<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\CatePost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Illuminate\Support\Facades\Redis;

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
    public function view_order($orderId){
        $this->AuthLogin();
        // lấy data từ bảng 
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();
      
        // đưa ra hiển thị  với dữ liệu lấy được
       $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
       return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
        
    }
    public function login_checkout()
    {   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$category_post);
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
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$category_post);
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
        
        return Redirect::to('transaction');
    }
    //  trang thanh toán
      public function transaction()
     {  $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$category_post);
     }

     public function order_transaction_place(Request $request)
     {
        // transaction
        $data = array();
        $data['transaction_method'] = $request->transaction_option;
        $data['transaction_status'] = 'Đang chờ xử lí';
        $transaction_id = DB::table('tbl_transaction')->insertGetId($data);

        // nhận order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['transaction_id'] = $transaction_id;
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
        //  hàm xử lí thanh toán
        if($data['transaction_method'] ==1)
        {
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
            $category_post = CatePost::orderBy('category_post_id','DESC')->get();
            $total_money= Cart::total(0,',','.');
            Session::get('shipping_id');
            Session::get('customer_id');
            
            return view('pages.vnpay.vnpay_index',compact('total_money'))->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$category_post);
        }
        elseif($data['transaction_method']==2)
        {
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
            $category_post = CatePost::orderBy('category_post_id','DESC')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$category_post);
        }
        //return Redirect::to('transaction');
     }
    //  tạo dữ liệu đổ vào
    public function createPayment(Request $request)
    {  
       
        $vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = Cart::total(0,',','.');
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')){
            // $vnpSecureHash = md5(env('VNP_HASH_SECRET') . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
         }
   
        return Redirect::to($vnp_Url);
         
    }
    //  hàm trả về kết quả khi thanh toán xong 
    public function vnpayReturn(Request $request)
    {
        dd($request->toArray());
        
        // return view('pages.vnpay.vnpay_return');
    }
    public function manage_order(){
        $this->AuthLogin();
        // lấy data từ bảng 
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderBy('tbl_order.order_id','desc')->paginate(6);
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }
  
}
