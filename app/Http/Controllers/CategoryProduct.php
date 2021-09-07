<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
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

    //-- hàm xử lí thêm danh mục sản phẩm
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');

    }

    // --hàm xử lí liệt kê ra danh mục sản phảm
    public function all_category_product(){
        $this->AuthLogin();
        // lấy data từ bảng 
        $all_category_product = DB::table('tbl_category_product')->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }

    //-- hàm xử lí lưu danh mục sản phẩm
    public function save_category_product(Request $request){
        $this->AuthLogin();
    // lấy dữ liệu từ form
        // khai báo biến data để lưu dữ liệu
        $data = array();
        // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_category_prodcut' view.
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

    // lưu dữ liệu vào database
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', " thêm danh mục thành công!");
        return Redirect::to("add-category-product");

    }

    // -- hàm xử lí nút nhấn ẩn hiện trong liệt kê danh mục sản phẩm
    public function active_category_product($category_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>1]);
        
        Session::put('message', " kích hoạt  danh mục thành công!");
        return Redirect::to("all-category-product");
    }
    public function unactive_category_product($category_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>0]);
        
        Session::put('message', " Không kích hoạt  danh mục thành công!");
        return Redirect::to("all-category-product");
    }

    // --- sửa xóa danh mục sản phẩm 
    public function edit_category_product($category_product_id)
    {   $this->AuthLogin();
        // lấy data từ bảng 
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function delete_category_product($category_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>0]);
        
        Session::put('message', " Không kích hoạt  danh mục thành công!");
        return Redirect::to("all-category-product");
    }

    // --- hàm Cập nhât danh mục 
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        // lấy dữ liệu từ form
            // khai báo biến data để lưu dữ liệu
            $data = array();
            // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_category_prodcut' view.
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;
           
    
        // lưu dữ liệu vào database
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
            Session::put('message', " cập nhật danh mục thành công!");
            return Redirect::to("all-category-product");
    
        }
    
    // --- hàm xóa danh mục sản phẩm 
    public function deletee_category_product($category_product_id){
        $this->AuthLogin();
       
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
            Session::put('message', " Xóa danh mục thành công!");
            return Redirect::to("all-category-product");
    
        }
}
