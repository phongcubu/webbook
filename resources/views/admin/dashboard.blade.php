@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
        p.title_thongke{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</div>
<div class="row">
    <p class="title_thongke">THỐNG KÊ THÔNG TIN CỦA SHOP</p>
    <form autocomplete="off" >
		{!! csrf_field() !!}
        <div class="col-md-2">
            <p>Từ ngày:<input type="date" id="date1" name="date1" class="form-control"></p>
        </div>
        <div class="col-md-2">
            <p>Đến ngày:<input type="date" name="date2" class="form-control"></p>
        </div><br>
        <button id ="btn_search" class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button><a href="{{URL::to('dashboard/')}}" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
    </form>
</div>
<div class="market-updates">
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-2">
			<a href="{{URL::to('all-product/')}}">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-eye"> </i>
				</div>
				<div class="col-md-8 market-update-left">
				    <h4>Sản phẩm</h4>
					<h3>
						{{$sp}}
					</h3>
					<p>Đang được bán</p>
				</div>
				<div class="clearfix"> </div>
			</a>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<a href="{{URL::to('all-user/')}}">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
                    <h4>Khách hàng</h4>
                    <h3>
                        {{$kh}}
                    </h3>
                    <p>Đã đăng ký</p>
				</div>
				<div class="clearfix"> </div>
			</a>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-3">
			<a href="{{URL::to('all-post')}}">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-newspaper-o fa-3x" style="color: white;"></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Số Tin Tức</h4>
					<h3>
                    {{$tt}}
					</h3>
					<p>Đã đăng lên</p>
				</div>
			    <div class="clearfix"> </div>
			</a>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-4">
			<a href="{{URL::to('manage-order/')}}">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</div>
				<div class="col-md-8 market-update-left">
					<h4>Số đơn hàng</h4>
						<h3>
                        {{$dh}}
						</h3>
						<p>Đã bán</p>
				</div>
				<div class="clearfix"> </div>
			</a>
		</div>
	</div>
</div>
<section class="wrapper">
    </section>
@endsection