@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng
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
              
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
            
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              
            <tr>
              
              <td>{{$order_by_id->customer_name}}</td>
              <td>{{$order_by_id->customer_phone}}</td>
             
               
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
              
              <th>Tên vận chuyển</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
            
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              
            <tr>
              
              <td>{{$order_by_id->shipping_name}}</td>
              <td>{{$order_by_id->shipping_address}}</td>
              <td>{{$order_by_id->shipping_phone}}</td>
               
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
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
            
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
                
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$order_by_id->product_name}}</td>
              <td>{{$order_by_id->product_sales_quantity}}</td>
              <td>{{$order_by_id->product_price}}</td>
              <td>{{$order_by_id->product_price*$order_by_id->product_sales_quantity}}</td>
            </tr>
           
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