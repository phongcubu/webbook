<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class BrandProduct extends Controller
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
     //-- hàm xử lí thêm thương hiệu sản phẩm
     public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');

    }

    // --hàm xử lí liệt kê ra thương hiệu sản phảm
    public function all_brand_product(){
        $this->AuthLogin();
        // lấy data từ bảng 
        $all_brand_product = DB::table('tbl_brand')->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }

    //-- hàm xử lí lưu thương hiệu sản phẩm
    public function save_brand_product(Request $request){
        $this->AuthLogin();
    // lấy dữ liệu từ form
        // khai báo biến data để lưu dữ liệu
        $data = array();
        // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_brand_prodcut' view.
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

    // lưu dữ liệu vào database
        DB::table('tbl_brand')->insert($data);
        Session::put('message', " thêm thương hiệu  thành công!");
        return Redirect::to("add-brand-product");

    }

    // -- hàm xử lí nút nhấn ẩn hiện trong liệt kê thương hiệu sản phẩm
    public function active_brand_product($brand_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status' =>1]);
        
        Session::put('message', " kích hoạt thương hiệu thành công!");
        return Redirect::to("all-brand-product");
    }
    public function unactive_brand_product($brand_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status' =>0]);
        
        Session::put('message', " Không kích hoạt  thương hiệu thành công!");
        return Redirect::to("all-brand-product");
    }

    // --- sửa xóa thương hiệu sản phẩm 
    public function edit_brand_product($brand_product_id)
    {   $this->AuthLogin();
        // lấy data từ bảng 
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function delete_brand_product($brand_product_id)
    {  $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status' =>0]);
        
        Session::put('message', " Không kích hoạt  thương hiệu thành công!");
        return Redirect::to("all-brand-product");
    }

    // --- hàm Cập nhât thương hiệu 
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        // lấy dữ liệu từ form
            // khai báo biến data để lưu dữ liệu
            $data = array();
            // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_brand_prodcut' view.
            $data['brand_name'] = $request->brand_product_name;
            $data['brand_desc'] = $request->brand_product_desc;
           
    
        // lưu dữ liệu vào database
            DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
            Session::put('message', " cập nhật thương hiệu thành công!");
            return Redirect::to("all-brand-product");
    
        }
    
    // --- hàm xóa thương hiệu sản phẩm 
    public function deletee_brand_product($brand_product_id){
        $this->AuthLogin();
            DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
            Session::put('message', " Xóa thương hiệu thành công!");
            return Redirect::to("all-brand-product");
    
        }
}
