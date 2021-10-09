<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\CatePost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Toastr;
session_start();
class ProductController extends Controller
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
     //-- hàm xử lí thêm thương hiệu sản phẩm
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('cate_post',$category_post);
    }
    // --hàm xử lí liệt kê ra thương hiệu sản phảm
    public function all_product(){
        $this->AuthLogin();
        // lấy data từ bảng 
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderBy('tbl_product.brand_id','desc')->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    //-- hàm xử lí lưu thương hiệu sản phẩm
    public function save_product(Request $request){
        $this->AuthLogin();
    // lấy dữ liệu từ form
        // khai báo biến data để lưu dữ liệu
        $data = array();
        // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_product_prodcut' view.
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_price_sale'] = $request->product_price_sale;
        $data['product_stock'] = $request->product_stock;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        $get_image = $request->file('product_image');
        if($get_image)
        {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(".",$get_name_image));
            $new_image = $name_image.rand(0,99).".".$get_image->getClientOriginalExtension();
            $get_image-> move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            \Toastr::success('Thêm sản phẩm thành công!','Thành Công');
            return Redirect::to("add-product");
        }
        $date['product_image'] = '';
    // lưu dữ liệu vào database
        DB::table('tbl_product')->insert($data);
        \Toastr::success('Thêm sản phẩm thành công!','Thành Công');
        return Redirect::to("all-product");

    }

    // -- hàm xử lí nút nhấn ẩn hiện trong liệt kê thương hiệu sản phẩm
    public function active_product($product_id)
    {   $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>1]);
    
        \Toastr::success('Kích hoạt sản phẩm!','Thành Công');
        return Redirect::to("all-product");
    }
    public function unactive_product($product_id)
    {   $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>0]);
    
        \Toastr::success('Không kích hoạt sản phẩm!','Thành Công');
        
        return Redirect::to("all-product");
    }

    // --- sửa xóa thương hiệu sản phẩm 
    public function edit_product($product_id)
    {   $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        
        // lấy data từ bảng 
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        // đưa ra hiển thị  với dữ liệu lấy được
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product)->with('cate_post',$category_post);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }


    // --- hàm Cập nhât thương hiệu 
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        // lấy dữ liệu từ form
            // khai báo biến data để lưu dữ liệu
            $data = array();
            // tên lấy theo cột dữ liệu = tên lấy theo name ở 'add_brand_prodcut' view.
            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;
            $data['product_price_sale'] = $request->product_price_sale;
            $data['product_stock'] = $request->product_stock;
            $data['product_desc'] = $request->product_desc;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            if($get_image)
            {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode(".",$get_name_image));
                $new_image = $name_image.rand(0,99).".".$get_image->getClientOriginalExtension();
                $get_image-> move('public/uploads/product',$new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                \Toastr::success('Cập nhật sản phẩm thành công!','Thành Công');
                return Redirect::to('add-product');
            }
        // lưu dữ liệu vào database
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);

            \Toastr::success('Cập nhật sản phẩm thành công!','Thành Công');
            return Redirect::to('all-product');
    
        }
    // --- hàm xóa thương hiệu sản phẩm 
    public function deletee_product($product_id){
        $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->delete();
      
            \Toastr::success('Xóa sản phẩm thành công!','Thành Công');
            return Redirect::to("all-product");
    
        }
    //end admin page
    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $category_post = CatePost::orderBy('category_post_id','DESC')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        foreach($details_product as $key =>$value){
            $category_id = $value->category_id;
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();
        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('product_details',$details_product)->with('relate',$related_product)->with('cate_post',$category_post);
    }
}
?>
