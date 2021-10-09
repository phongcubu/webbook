<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Post;

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
    	return view('admin.catepost.add_post');
    }
    //---- lưu danh mục được thêm vào
	public function save_category_post(Request $request){
      
        $this->AuthLogin();
        $data = $request->all();
    	$category_post = new CatePost();
    	$category_post->category_post_name = $data['category_post_name'];
    	$category_post->category_post_slug = $data['category_post_slug'];
    	$category_post->category_post_desc = $data['category_post_desc'];
    	$category_post->category_post_status = $data['category_post_status'];
    	$category_post->save();
   
        \Toastr::success('Thêm danh mục bài viết thành công!','Thành Công');
    	return redirect()->back();
    }

    // --- sửa xóa danh mục bài viết
    public function edit_category_post($category_post_id)
    {   $this->AuthLogin();
        $edit_category_post = CatePost::find($category_post_id);
        return view('admin.catepost.edit_post')->with(compact('edit_category_post'));
    }

    // --- hàm Cập nhât danh mục 
    public function update_category_post(Request $request,$category_post_id){
        $this->AuthLogin();

        $data = $request->all();
    	$category_post = CatePost::find($category_post_id);
    	$category_post->category_post_name = $data['category_post_name'];
    	$category_post->category_post_slug = $data['category_post_slug'];
    	$category_post->category_post_desc = $data['category_post_desc'];
    	$category_post->category_post_status = $data['category_post_status'];
    	$category_post->save();

 
        \Toastr::success('Cập nhật danh mục bài viết thành công!','Thành Công');
    	return redirect('/all-category-post');
        }
     // --- hàm xóa danh mục bài viết
     public function deletee_category_post($category_post_id){
        $category_post = CatePost::find($category_post_id);
   		$category_post->delete();

        \Toastr::success('Xóa danh mục bài viết thành công!','Thành Công');
    
    	return redirect()->back();
        }

    public function all_category_post(){
        $this->AuthLogin();
       
        $this->AuthLogin();

        $all_category_post = CatePost::orderBy('category_post_id','DESC')->paginate(5);

    	return view('admin.catepost.list_post')->with(compact('all_category_post'));
    }
    
  

}
