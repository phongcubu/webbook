@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
   
    <h2 class="title text-center">sản phẩm mới</h2>
   
    @foreach($all_product as $key => $product)
    <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                        <div class="product-detail-text" style=" height: 80px; ">
                            <p class="product-name">{{$product->product_name}}</p>
                            <p style="height: 20px;">
                            
                                <span class="new_price">{{number_format(floatval($product->product_price_sale)).' '.'vnđ'}}</span>
                                <span class="old_price">{{number_format($product->product_price).' '.'vnđ'}}</span>
                            </p>
                        </div>
                        <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart" style="margin: 10px 0px">Chi tiết sản phẩm</a>
                    </div>
                </div>
                
            </div>
        </div>
    </a>
    @endforeach
</div><!--features_items-->
<div style="margin-left: 40%" class="pagination pagination-lg">
    <li>{!! $all_product->links() !!}</li>
     
</div>
@endsection