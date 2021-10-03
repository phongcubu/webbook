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
    <p class="title_thongke">THỐNG KÊ ĐƠN HÀNG DOANH SỐ</p>
    <form autocomplete="off">
        @csrf
        <div class="col-md-2">
            <p>Từ ngày:<input type="text" id="datepicker" class="form-control"></p><br>
            <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
        </div>
        <div class="col-md-2">
            <p>Đến ngày:<input type="text" id="datepicker2" class="form_control"></p>
        </div>
        <div class="col-md-2">
            <p>
                Lọc theo:<br>
                <select class="dashboard-filter form_control">
                    <option>---Chọn---</option>
                    <option>7 ngày qua</option>
                    <option>Tháng trước</option>
                    <option>Tháng này</option>
                    <option>1 năm qua</option>
                </select>
            </p>
        </div>
    </form>
    <div class="col-md-12">
        <div id="myfirschart" style="height: 250px;"></div>
    </div>
</div>
<section class="wrapper">
    </section>
@endsection