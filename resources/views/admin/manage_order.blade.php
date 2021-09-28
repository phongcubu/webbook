@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Đơn Hàng
      </div>
      <?php
      $message = Session::get('message');
      if($message){
          echo $message;
          Session::put("message",null);
      }
  ?>
      
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên người đặt</th>
              <th>Tổng giá tiền</th>
              <th>Tình trạng</th>
             
              <th style="width:30px;"></th>
              <th>Chi tiết đơn </th>
            
            </tr>
          </thead>
          <tbody>
              @foreach ($all_order as $key =>$order)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$order->customer_name}}</td>
              <td>{{$order->order_total}}</td>
              <td>{{$order->order_status}}<td>
                <td> 
                    <a href="{{URL::to('view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
               
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          
          <div class="col-sm-7 text-right text-center-xs" style="float:right">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              {!!$all_order ->links()!!}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection