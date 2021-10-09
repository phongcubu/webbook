@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php  
            //  lay dc tat ca khi min them vao gio han
            $content=Cart::content();
            ?> 
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description ">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content) 
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4 style="width: 195px;text-align: left;"><a href=""></a>{{$v_content->name}}</h4> 
                            <p>mã sản phẩm:{{$v_content->id}}</p>
                        </td>
                        <td class="cart_price">
                             <p>{{number_format($v_content->price,0,',','.').''.'vnđ'}}</p> 
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('update-cart-quantity')}}" method="POST">
                                    {{ csrf_field() }}
                                <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}} "  >
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                <input type="submit" value="cập nhật" name="update_qty" class="btn btn-default btn-small">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                          
                            <p class="cart_total_price">
                                <?php
                                    
                                    $cart_total_price = $v_content->price * $v_content->qty;
                                    echo number_format($cart_total_price,0,',','.').''.'vnđ';
                                    
                                    ?>    
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('delete-to-cart/'.$v_content->rowId)}}"><i style="color: red" class="fa fa-trash-o "></i></a>
                        </td>
                    </tr>
                 @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                      <li>Tổng <span>{{Cart::priceTotal(0,',','.').' '.'vnđ'}}</span></li>
                        <li>Phí vận chuyển <span>{{Cart::tax(0,',','.').' '.'vnđ'}}</span></li>
                        <li>Thành tiền <span>{{Cart::total(0,',','.').' '.'vnđ'}}</span></li> 
                    </ul>
               
                    <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id!=NULL){ 
                  ?>
                   {{-- đăng nhập trước rồi đến trang thanh to --}}
                 <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Kiểm Tra Thanh toán</a>
                 <?php
             }else{
                  ?>
                  {{-- người dùng chưa đăng nhập đẩy về trang login --}}
                  <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Kiểm TraThanh toán</a>
                  <?php 
              }
                  ?>
               
               
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection