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
            Session::put('message','Thêm bài viết thành công');
            return redirect()->back();
        }else{
        	Session::put('message','Làm ơn thêm hình ảnh');
            return redirect()->back();
        }

       
    }

    // // --hàm  liệt kê ra thương hiệu sản phảm
    // public function all_product(){
    //     $this->AuthLogin();
    //     // lấy data từ bảng 
    //     $all_product = DB::table('tbl_product')
    //     ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    //     ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    //     ->orderBy('tbl_product.brand_id','desc')->paginate(5);
    //     // đưa ra hiển thị  với dữ liệu lấy được
    //     $manager_product = view('admin.all_product')->with('all_product',$all_product);
    //     return view('admin_layout')->with('admin.all_product',$manager_product);
    // }

  

    // // -- hàm xử lí nút nhấn ẩn hiện trong liệt kê thương hiệu sản phẩm
    // public function active_product($product_id)
    // {   $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>1]);
    //     Session::put('message', " kích hoạt sản phẩm thành công!");
    //     return Redirect::to("all-product");
    // }
    // public function unactive_product($product_id)
    // {   $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>0]);
    //     Session::put('message', " Không kích hoạt sản phẩm thành công!");
    //     return Redirect::to("all-product");
    // }

    // // --- sửa xóa thương hiệu sản phẩm 
    // public function edit_product($product_id)
    // {   $this->AuthLogin();
    //     $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
    //     $category_post = CatePost::orderBy('category_post_id','DESC')->get();
    //     // lấy data từ bảng 
    //     $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
    //     // đưa ra hiển thị  với dữ liệu lấy được
    //     $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
    //     ->with('brand_product',$brand_product)->with('cate_post',$category_post);
    //     return view('admin_layout')->with('admin.edit_product',$manager_product);
    // }
    // public function delete_product($product_id)
    // {  $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>0]);
        
    //     Session::put('message', " Không kích hoạt  thương hiệu thành công!");
    //     return Redirect::to("all-product");
    // }

    // // --- hàm Cập nhât thương hiệu 
    // public function update_product(Request $request,$product_id){
    //     $this->AuthLogin();
    //     // lấy dữ liệu từ form
    //         // khai báo biến data để lưu dữ liệu
    //         $data = array();
    //         // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_brand_prodcut' view.
    //         $data['product_name'] = $request->product_name;
    //         $data['product_price'] = $request->product_price;
    //         $data['product_price_sale'] = $request->product_price_sale;
    //         $data['product_desc'] = $request->product_desc;
    //         $data['product_content'] = $request->product_content;
    //         $data['category_id'] = $request->product_cate;
    //         $data['brand_id'] = $request->product_brand;
    //         $data['product_status'] = $request->product_status;
    //         $get_image = $request->file('product_image');
    //         if($get_image)
    //         {
    //             $get_name_image = $get_image->getClientOriginalName();
    //             $name_image = current(explode(".",$get_name_image));
    //             $new_image = $name_image.rand(0,99).".".$get_image->getClientOriginalExtension();
    //             $get_image-> move('public/uploads/product',$new_image);
    //             $data['product_image'] = $new_image;
    //             DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    //             Session::put('message', "cập nhật thành công!");
    //             return Redirect::to('add-product');
    //         }
    //     // lưu dữ liệu vào database
    //         DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    //         Session::put('message', " cập nhật sản phẩm thành công!");
    //         return Redirect::to('all-product');
    
    //     }
    // // --- hàm xóa thương hiệu sản phẩm 
    // public function deletee_product($product_id){
    //     $this->AuthLogin();
    //         DB::table('tbl_product')->where('product_id',$product_id)->delete();
    //         Session::put('message', " Xóa sản phẩm thành công!");
    //         return Redirect::to("all-product");
    
    //     }
}
