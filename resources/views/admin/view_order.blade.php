@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng
      </div>

      
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order_by_id as $key => $order )
              
            @endforeach
            <tr>
              <td>{{$order->customer_name}}</td> 
              <td>{{$order->customer_phone}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    
    </div>
  </div>
  <br>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển
      </div>
   
      
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Tên vận chuyển</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
            
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order_by_id as $key => $order )
              
            @endforeach
            <tr>
              
              <td>{{$order->shipping_name}}</td>
              <td>{{$order->shipping_address}}</td>
              <td>{{$order->shipping_phone}}</td>
               
            </tr>
            
          </tbody>
        </table>
      </div>
    
    </div>
  </div>
  <br><br>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê chi tiết đơn hàng
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
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
            
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order_by_id as $key => $order )
              
         
            <tr>
                
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$order->product_name}}</td>
              <td>{{$order->product_sales_quantity}}</td>
              <td>{{number_format($order->product_price).' '.'vnđ'}}</td>
              <td>{{number_format($order->product_price*$order->product_sales_quantity).' '.'vnđ'}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
        
          <div class="col-sm-7 text-right text-center-xs " style="float: right">                    
            <ul class="pagination pagination-sm m-t-none m-b-none">
              
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection