@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Danh Mục Sản Phẩm
                </header>
                <div class="panel-body">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put("message",null);
                        }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('save-product')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" 
                            placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm gốc</label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" 
                            placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm sale</label>
                            <input type="text" class="form-control" name="product_price_sale" id="exampleInputEmail1" 
                            placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" class="form-control" name="product_stock" id="exampleInputEmail1" 
                            placeholder="Số Lượng sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control image-preview" name="product_image" id="exampleInputEmail1" 
                            placeholder="Hình ảnh sản phẩm" onchange="previewFile(this);">
                            <img  src="https://lukoilonline.com/uploadFiles/default.png" width="20%" id="previewImg" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả sản phẩm</label>
                            <textarea  style="resize: none" rows="8" name="product_desc" class="form-control ckeditor" id="exampleInputPassword1" placeholder="Nội dung mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea  style="resize: none" rows="8" name="product_content" class="form-control ckeditor" id="exampleInputPassword1" placeholder="Nội dung mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh muc sản phẩm</label>
                            <select name="product_cate" class="form-control input-lg m-bot15">
                                @foreach($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiểu sản phẩm</label>
                            <select name="product_brand" class="form-control input-lg m-bot15">
                                @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                <option value="1">hiện</option>
                                <option value="0">ẩn </option>
                            </select>
                        </div>
                        
                        <button type="submit" name="update_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>
</div>
@endsection