@extends('welcome')
@section('content')
                    @foreach($product_details as $key => $value)
                    <div class="product-details"><!--product-details-->
                    	<div class="three" >
							<h2 style="background-color: #fff; color:aqua">Chi Tiết Sản Phẩm</h2>
					</div>
						<div class="col-sm-5">
							<div class="view-product">
								<img  src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
							</div>
							
						</div>
						<div class="col-sm-7">
							<div class="product-information "><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('save-cart')}}" method="POST">
									{{ csrf_field() }}
									<span>
										<span style="color: rgb(223, 18, 18)">{{number_format($value->product_price_sale).' '.'đ'}}</span>
										<label>Số lượng:</label>
										<input type="number" name="qty" min="1" value="1" /> <br>
										<input type="hidden" name="productid_hidden" min="1" value="{{$value->product_id}}" /> <br>
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											 Mua hàng
										</button>
									</span>
								</form>
							
								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mới 100%</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
                                <p><b>Danh mục:</b> {{$value->category_name}}</p>
								<a href=""><img src="{{asset('public/frontend/images/product-details/share.png')}}" class="share "  alt="" /></a>
							</div><!--/product-information-->
							   <hr>
                         <div class="row">
                            <div class="col-sm-4" >
                            <table>
                                <tr>
                                    <td><img src="{{asset('public/frontend/images/shop/doitra.png')}}" style=" width: 43px;height: 36px; " alt=""></td>
                                    <td style="font-size:12px">7 ngày miễn phí trả hàng</td>
                                </tr>
                            </table>
                            </div>
                            <div class="col-sm-4" >
                            <table>
                                <tr>
                                    <td><img  src="{{asset('public/frontend/images/shop/chinhhang.png')}}" style=" width: 43px;height: 36px; " alt=""></td>
                                    <td style="font-size:12px">Hàng chính hãng 100%</td>
                                </tr>
                            </table>
                            </div>
                            <div class="col-sm-4">
                               
                                <table>
                                <tr>
                                    <td><img  src="{{asset('public/frontend/images/shop/ship.png')}}" style=" width: 43px;height: 36px; " alt=""></td>
                                    <td style="font-size:12px">Miễn phí vận chuyển </td>
                                </tr>
                            </table>
                            </div>
                           
                            </div>
						</div>
					</div><!--/product-details-->
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">	
								<li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
								{{-- <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li> --}}
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details"  >
                                <p>{!!$value->product_desc!!}</p>
							</div>
							<div class="tab-pane fade" id="companyprofile" >
                                <p>{!!$value->product_content!!}</p>
                            </div>

						</div>
					</div><!--/category-tab-->
                    @endforeach
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                    @foreach($relate as $key =>$lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                                    {{-- <h2>{{number_format($lienquan->product_price).' '.'vnđ'}}</h2>
                                                    <p>{{$lienquan->product_name}}</p> --}}
													<p class="product-name">{{$lienquan->product_name}}</p>
													<p style="height: 20px;">
														<span class="new_price">{{number_format(floatval($lienquan->product_price_sale)).' '.'vnđ'}}</span>
														<span class="old_price">{{number_format($lienquan->product_price).' '.'vnđ'}}</span>
													</p>
                                                    <a href="{{URL::to('chi-tiet-san-pham/'.$lienquan->product_id)}}" class="btn btn-default add-to-cart" style="margin: 10px 0px">Chi tiết sản phẩm</a>
                                                </div>
                                            </div>
										</div>
									</div>
                                    @endforeach
								</div>
                                
							</div>
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div><!--/recommended_items-->
@endsection
