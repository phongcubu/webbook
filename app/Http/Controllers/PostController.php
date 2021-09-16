<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class PostController extends Controller
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

    public function add_category_post(){
        $this->AuthLogin();
    	return view('admin.post.add_post');
    }
	public function save_category_post(Request $request){
      
        $this->AuthLogin();
        // lấy dữ liệu từ form
            // khai báo biến data để lưu dữ liệu
            $data = array();
            // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_brand_prodcut' view.
            $data['category_post_name'] = $request->cate_post_name;
            $data['category_post_desc'] = $request-> cate_post_desc ;
           
            $data['category_post_status'] = $request->cate_post_status;
    
        // lưu dữ liệu vào database
            DB::table('tbl_category_post')->insert($data);
            Session::put('message','Thêm danh mục bài viết thành công');
            return Redirect::to("add-category-post");
    }
        // --- sửa xóa danh mục bài viết
        public function edit_category_post($category_post_id)
        {   $this->AuthLogin();
            // lấy data từ bảng 
            $edit_category_post = DB::table('tbl_category_post')->where('category_post_id',$category_post_id)->get();
            // đưa ra hiển thị  với dữ liệu lấy được
            $manager_category_post = view('admin.post.edit_post')->with('edit_category_post',$edit_category_post);
            return view('admin_layout')->with('admin.post.edit_post',$manager_category_post);
        }
      // --- hàm Cập nhât danh mục 
    public function update_category_post(Request $request,$category_post_id){
        $this->AuthLogin();
        // lấy dữ liệu từ form
            // khai báo biến data để lưu dữ liệu
            $data = array();
            // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_category_prodcut' view.
            $data['category_post_name'] = $request->cate_post_name;
            $data['category_post_desc'] = $request->cate_post_desc;
        // lưu dữ liệu vào database
            DB::table('tbl_category_post')->where('category_post_id',$category_post_id)->update($data);
            Session::put('message', " cập nhật danh mục bài viết thành công!");
            return Redirect::to("all-category-post");
        }
     // --- hàm xóa danh mục bài viết
     public function deletee_category_post($category_post_id){
        $this->AuthLogin();
            DB::table('tbl_category_post')->where('category_post_id',$category_post_id)->delete();
            Session::put('message', " Xóa danh mục bài viết thành công!");
            return Redirect::to("all-category-post");
        }

    public function all_category_post(){
        $this->AuthLogin();
        // lấy data từ bảng 
        $all_category_post = DB::table('tbl_category_post')->paginate(3);
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_category_post = view('admin.post.list_post')->with('all_category_post',$all_category_post);
        return view('admin_layout')->with('admin.all_category_post',$manager_category_post);
    }
    
    public function danh_muc_bai_viet($category_post_id){
        // $this->AuthLogin();
        // // lấy data từ bảng 
        // $all_category_post = DB::table('tbl_category_post')->paginate(3);
        // // đưa ra hiển thị  với dữ liệu lấy được
        // $manager_category_post = view('admin.post.list_post')->with('all_category_post',$all_category_post);
        // return view('admin_layout')->with('admin.all_category_post',$manager_category_post);
    }
}
