<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Post;
use App\Models\CatePost;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class Posts extends Controller
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
     //-- hàm  thêm thương hiệu sản phẩm
    public function add_post(){
        $this->AuthLogin();
      
        $cate_post = CatePost::orderBy('category_post_id','DESC')->get(); 
       
        return view('admin.post.add_post')->with(compact('cate_post'));
    }

    public function save_post(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
    	$post = new Post();

    	$post->post_title = $data['post_title'];
    	$post->post_slug = $data['post_slug'];
    	$post->post_desc = $data['post_desc'];
    	$post->post_content = $data['post_content'];
    	
    	$post->category_post_id = $data['cate_post_id'];
    	$post->post_status = $data['post_status'];

        $get_image = $request->file('post_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
            $name_image = current(explode('.',$get_name_image));

            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/post',$new_image);

            $post->post_image = $new_image;

           	$post->save();
          
            \Toastr::success('Thêm bài viết thành công!','Thành Công');
            return redirect()->back();
        }else{
        
            \Toastr::error('Làm ơn thêm hình ảnh!','Thành Công');
            return redirect()->back();
        }

       
    }
    public function all_post(){
        $this->AuthLogin();
        
    	$all_post = Post::with('category_post')->orderBy('category_post_id')->paginate(5);
       
    	return view('admin.post.list_post')->with(compact('all_post',$all_post));

    }
    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;

        if($post_image){
        	$path ='public/uploads/post/'.$post_image;
        	unlink($path);
        }
        $post->delete();
        
        \Toastr::success('Xóa bài viết thành công!','Thành Công');
        return redirect()->back();
    }
    public function edit_post($post_id){
        $cate_post = CatePost::orderBy('category_post_id')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit_post')->with(compact('post','cate_post'));
    }
    public function update_post(Request $request,$post_id){
    $this->AuthLogin();
     $data = $request->all();
     $post = Post::find($post_id);

     $post->post_title = $data['post_title'];
     $post->post_slug = $data['post_slug'];
     $post->post_desc = $data['post_desc'];
     $post->post_content = $data['post_content'];
     $post->category_post_id = $data['category_post_id'];
     $post->post_status = $data['post_status'];

     $get_image = $request->file('post_image');
   
     if($get_image){
         //xoa anh cu
         $post_image_old = $post->post_image;
         $path ='public/uploads/post/'.$post_image_old;
         unlink($path);
         //cap nhat anh moi
         $get_name_image = $get_image->getClientOriginalName(); //lay ten của hình ảnh
         $name_image = current(explode('.',$get_name_image));
         $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         $get_image->move('public/uploads/post',$new_image);
         $post->post_image = $new_image; 
    }

     $post->save();
     \Toastr::success('Cập nhật bài viết thành công!','Thành Công');
     return redirect()->back();
    }
    public function danh_muc_bai_viet(Request $request, $category_post_slug){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $key = $request->keywords;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();

        //category post
        $cate_post = CatePost::orderBy('category_post_id','DESC')->get();
        $catepost = CatePost::where('category_post_slug',$category_post_slug)->take(1)->get();
        foreach($catepost as $key => $cate){
           
            $cate_id = $cate->category_post_id;
            $meta_title = $cate->category_post_name;
           
        }
        $post_cate = Post::with('category_post')->where('post_status',1)->where('category_post_id',$cate_id)->paginate(4);

        return view('pages.baiviet.danhmucbv')->with('meta_title',$meta_title)->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$cate_post)->with('search_product',$search_product)->with('post_cate',$post_cate);
      
    }

    public function bai_viet(Request $request, $post_slug){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $key = $request->keywords;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();
        //category post
        $cate_post = CatePost::orderBy('category_post_id','DESC')->get();

        $post_by_id = Post::with('category_post')->where('post_status',1)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post_by_id as $key => $p){
            
            $meta_title = $p->post_title;
            $cate_post_id = $p->category_post_id;
    
        
        }
         //bài viết liên quan
         $related = Post::with('category_post')->where('post_status',1)->where('category_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();

        return view('pages.baiviet.baiviettin')->with('related',$related)->with('meta_title',$meta_title)->with('category',$cate_product)->with('brand',$brand_product)->with('cate_post',$cate_post)->with('search_product',$search_product)->with('post_by_id',$post_by_id);
    }
}
