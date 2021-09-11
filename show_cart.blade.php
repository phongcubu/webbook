@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php  
           
             $content=Cart::content();
             echo '<pre>';
                print_r($content);
            echo '</pre>';

            ?> 
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($content as $v_content) --}}
                    <tr>
                        <td class="cart_product">
                            {{-- {{URL::to('public/uploads/product/'.$v_content->options->image)}} --}}
                            <a href=""><img src="" width="50" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            {{-- {{$v_content->name}} --}}
                            <h4><a href=""></a></h4> 
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            {{-- <p>{{number_format($v_content->price).''.'vnđ'}}</p> --}}
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                {{-- $v_content->qty --}}
                                <input class="cart_quantity_input" type="text" name="quantity" value="" autocomplete="off" size="2" >
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            {{-- {{cart::subtotal().''.'vnd'}} --}}
                            <p class="cart_total_price"></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
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
                        <li>Tổng <span>{{Cart::total().' '.'vnđ'}}</span></li>
                        <li>Thuế <span>{{Cart::tax().' '.'vnđ'}}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total().' '.'vnđ'}}</span></li>
                    </ul>
                    {{-- 	<a class="btn btn-default update" href="">Update</a> --}}
                          <?php
                               $customer_id = Session::get('customer_id');
                               if($customer_id!=NULL){ 
                             ?>
                              
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                            <?php
                        }else{
                             ?>
                             
                             <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                             <?php 
                         }
                             ?>
                            
                        

                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection