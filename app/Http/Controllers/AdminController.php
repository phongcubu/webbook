<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    // hàm đăng nhập admin
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


    // hàm hiển thi login
    public function index(){
        return view('admin_login');
    }

    // hàm hiển thị trang thống kê , điều khiển
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    //  hàm login hiển thị trang điều khiển khi đăng nhập thành công
    public function dashboard(Request $request){
        $this->AuthLogin();

        // biến admin_email sẽ lây tên trường admin trong form admin_login.blade.php
       $admin_email = $request->admin_email;
       $admin_password = md5($request->admin_password);
        // vào bảng  trong csdl , vs điều kiện admin_email = biến $admin_email. first: chỉ lấy 1 user
       $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        //  nếu được ($result) đăng nhập thành công lấy tên người dùng và id của họ
        //  chuyển vào trang điều khiển
       if($result){
           Session::put('admin_name', $result->admin_name);
           Session::put('admin_id',$result->admin_id);
           return redirect('dashboard/');
       }
        // không lấy được thì đẩy cho họ thông báo, đầy về trang đăng nhập 
       else
       {
        Session::put('message',"mật khẩu hoăc email không chính xác !");
         return redirect('admin-login/');
       }
       return view('admin.dashboard');
    }

     //  hàm logout
     public function logout(){
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id',null);
        return redirect('admin-login/');
    }


}
