@extends('admin_layout')
@section('admin_content')
 {{--  bảng đơn hàng --}}
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Quản Lý Đơn Hàng
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
              <th>Tên người đặt</th>
              <th>Phương thức thanh toán</th>

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
              @if($order->transaction_method == 1)
                <td>Thanh toán qua ATM</td>
              @else
                <td>Thanh toán qua khi nhận hàng</td>
              @endif
            <td>{{number_format((float)$order->order_total, 3).''.'vnđ'}}</td>
          
              <td>{{$order->order_status}}<td>
              <td> 
                  <a href="{{URL::to('view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-file-text-o text-success text-active" style="font-size: 26px;margin-left: 20px;"></i>
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

 <div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          liệt Kê thanh toán của khách hàng
      </div>
    {{-- bảng giao dịch thanh toán --}}
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Mã đơn hàng giao dịch</th>
            <th>Tên người đặt</th>
            <th>Số tiền thanh toán</th>
            <th>Ghi chú đơn hàng</th>
            <th>Mã giao dịch tại vnpay</th>
            <th></th>
            <th>Mã ngân hàng</th>
            <th>Thời gian giao dịch</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($all_payment as $key =>$payment)
          <tr>
          
            <td>{{$payment->payment_code}}</td>
            <td>{{$payment->customer_name}}</td>
            <td>{{number_format($payment->payment_money).' '.'vnđ'}}</td>
            <td>{{$payment->payment_note}}</td>
            <td>{{$payment->payment_code_vnpay}}<td>
            <td>{{$payment->payment_code_bank}}</td>
            <td>{{$payment->payment_time}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        
        <div class="col-sm-7 text-right text-center-xs" style="float:right">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          {!!$all_payment->links()!!} 
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection