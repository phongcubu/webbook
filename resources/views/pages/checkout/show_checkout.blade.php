@extends('welcome')
@section('content')

<section id="cart_items" class="cart_items">
    <div class="" >
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Kiểm tra thanh toán</li>
            </ol>
        </div>

       
        

        <div class="register-req">
            <p>Hãy đăng kí hoặc đăng nhập để thanh toán hàng hóa </p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
               
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin thanh toán</p>
                        <div class="form-one">
                            <form action="{{URL::to('save-checkout-customer')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="shipping_name" placeholder="Họ và tên">
                                <input type="text"name="shipping_email" placeholder="Email*">
                                <input type="text" name="shipping_phone" placeholder="Số điện thoại">
                                <input type="text" name="shipping_address" placeholder="Địa chỉ *">
                                <textarea  name="shipping_notes"  placeholder="ghi chú đơn hàng" rows="16"></textarea>
                                
                                <input type="submit" value="Xong" name="send_order" class="btn btn-primary btn-small">
                                
                              
                            </form>
                        </div>
                       
                    </div>
                </div>
               				
            </div>
        </div>
        {{-- <div class="review-payment">
            <h2>Xem lại giỏ hàng và thanh toán </h2>
        </div> --}}

   
        {{-- <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div> --}}
    </div>
</section> <!--/#cart_items-->
@endsection