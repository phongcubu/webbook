<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeControllers extends Controller
{
    public function home(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
<<<<<<< HEAD
        $cate_post = DB::table('tbl_category_post')->where('category_post_status','1')->orderBy('category_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->paginate(9);
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('cate_post ',$cate_post );
=======
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
>>>>>>> 5f7ae42765e7a3022f2a37e086b20b7d11dade58
    }
    public function search(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        
        $key = $request->keywords;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();
        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }

    public function contact()
    {

        return view('pages.contact');
    }
  
}