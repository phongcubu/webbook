@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Câp Nhật Sản Phẩm
                </header>
                <div class="panel-body">
                    <?php
                    use Illuminate\Support\Facades\Session;
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put("message",null);
                        }
                    ?>
                    @foreach($edit_product as $key => $pro);
                    
                    <div class="position-center">
                            <form role="form" action="{{URL::to('update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" 
                                    value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm gốc</label>
                                    <input type="text" class="form-control" value="{{$pro->product_price}}" name="product_price" 
                                    id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm sale</label>
                                    <input type="text" class="form-control" name="product_price_sale" id="exampleInputEmail1" 
                                    placeholder="Giá sản phẩm" value="{{$pro->product_price_sale}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" class="form-control" name="product_stock" id="exampleInputEmail1" 
                                    placeholder="Số Lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" name="product_desc" class="form-control ckeditor" id="exampleInputPassword1" 
                                    >{{$pro->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea  style="resize: none" rows="8" name="product_content" class="form-control ckeditor" id="exampleInputPassword1" 
                                    >{{$pro->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh muc sản phẩm</label>
                                    <select name="product_cate" class="form-control input-lg m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiểu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-lg m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            @if($cate->category_id==$pro->category_id)
                                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @else
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endif
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
                                
                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                                
                            </form>
                        

                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection