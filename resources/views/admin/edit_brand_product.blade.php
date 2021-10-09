@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Danh Mục Sản Phẩm
                </header>
                <div class="panel-body">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put("message",null);
                        }
                    ?>
                    @foreach ($edit_brand_product as $key =>$edit_value )
                        
                  
                    <div class="position-center">
                        <form role="form" action="{{URL::to('update-brand-product/'.$edit_value->brand_id)}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                            <input type="text" class="form-control" value="{{$edit_value->brand_name}}" name="brand_product_name" id="exampleInputEmail1" placeholder="tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                            <input name="id1" style="resize: none" value="{{$edit_value->brand_desc}}" rows="8" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Nội dung mô tả">
                        </div>
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>
                    @endforeach

                </div>
            </section>

    </div>
 
</div>
</div>
@endsection