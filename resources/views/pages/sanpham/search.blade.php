@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Kết Qủa Tìm Kiếm</h2>
    @foreach($search_product as $key => $product)
    <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                    <div class="product-detail-text" style=" height: 80px; ">
                    <p>{{$product->product_name}}</p>
                    <h2 style="font-size: 17px;">{{number_format($product->product_price_sale).' '.'vnđ'}}</h2>
                    
                    </div>
                    <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart" style="margin: 10px 0px">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div><!--features_items-->
@endsection