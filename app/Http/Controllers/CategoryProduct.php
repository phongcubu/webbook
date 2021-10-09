<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\CatePost;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
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
        $all_category_product = DB::table('tbl_category_product')->paginate(9);
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
        \Toastr::success('Thêm danh mục thành công!', 'Thành Công');
        return Redirect::to("add-category-product");
    }
    // -- hàm xử lí nút nhấn ẩn hiện trong liệt kê danh mục sản phẩm
    public function active_category_product($category_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>1]);
        
        
        \Toastr::success('Kích hoạt danh mục', 'Thành Công');
        return Redirect::to("all-category-product");
    }
    public function unactive_category_product($category_product_id)
    {   $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>0]);
        \Toastr::success('Không kích hoạt ', 'Thành Công');
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
            \Toastr::success('Cập nhật danh mục thành công! ', 'Thành Công');
            return Redirect::to("all-category-product");
        }
    // --- hàm xóa danh mục sản phẩm 
    public function deletee_category_product($category_product_id){
        $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
       
            \Toastr::success('Xóa danh mục thành công!', 'Thành Công');
            return Redirect::to("all-category-product");
        }
    //kết thúc hàm admin page
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=',
        'tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->paginate(3);
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('cate_post',$category_post);
    }
    
}
