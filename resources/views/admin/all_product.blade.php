@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Liệt Kê Sản Phẩm
        </div>
 
        <div class="table-responsive">
            <table class="table table-striped b-t b-light" id="table1">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên Sản Phẩm </th>
                        <th>Giá Gốc Sản Phẩm </th>
                        <th>Giá Sale Sản Phẩm </th>
                        <th>Hình Sản Phẩm </th>
                        <th>Danh Mục Sản Phẩm </th>
                        <th>Thương Hiệu Sản Phẩm </th>
                        <th>Hiển Thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_product as $key =>$pro )
                    <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{$pro->product_name}}</td>
                    <td>{{$pro->product_price}}</td>
                    <td>{{$pro->product_price_sale}}</td>
                    <td><img src="public/uploads/product/{{$pro->product_image}}" height="100" width="100"></td>
                    <td>{{$pro->category_name}}</td>
                    <td>{{$pro->brand_name}}</td>
                    <td>
                        <span class="text-ellipsis">
                        <?php
                            if($pro->product_status == 1)
                            {
                            ?>   
                            <a href="{{URL::to('unactive-product/'.$pro->product_id)}}"><span class=" fa fa-eye" style="font-size: 25px; color:green"></span></a>
                            <?php   
                            }
                            else {
                            ?>   
                                <a  href="{{URL::to('active-product/'.$pro->product_id)}}"><span class=" fa fa-eye-slash" style="font-size: 25px; color:red"></span></a>
                            <?php   
                            }                        
                            ?>
                        </span>
                    </td>
                <td>
                    <a href="{{URL::to('edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a  onclick="return confirm('bạn chắc chắn muốn xóa sản phẩm này không ?')" href="{{URL::to('delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-trash-o text-danger text"></i>
                    </a>
                </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection