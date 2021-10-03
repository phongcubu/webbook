@extends('admin_layout')
@section('admin_content')
{{--  bảng khách hàng --}}
<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
        Quản Lý Khách Hàng
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
        <thead>
            <tr>
            <th style="width:20px;">
                <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
                </label>
            </th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_user as $key =>$customers)
            <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$customers->customer_name}}</td>
            <td>{{$customers->customer_email}}</td>
            <td>{{$customers->customer_phone}}<td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
        <div class="col-sm-7 text-right text-center-xs" style="float:right">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_user ->links()!!} 
            </ul>
        </div>
        </div>
    </footer>
    </div>
</div>
@endsection