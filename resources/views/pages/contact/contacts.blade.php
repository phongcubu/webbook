<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Liên Hệ | PSP-BOOK</title>
   
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>

    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i><span style="color:red"> Hotline:</span>0814515062 - Phong | 0994494813 - Sơn | 0994494813 - Phương</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> pspbook@gmail.com</a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua hàng : 8:00am - 21h30pm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#" class="nav_icon"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="nav_icon"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="nav_icon"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img style="width:90px;height: 70px;border-radius: 50%;" src="{{asset('public/frontend/images/shop/logo2.jpg')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                               
                            </div>
                            
                            <div class="btn-group">
                               
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" style="margin-top:16px; ">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                
                                <li><a href="{{URL::to('admin-login')}}"><i class="fa fa-user"></i>Trang Admin</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Yêu Thích</a></li>
                                <?php 
                                $customer_id = Session::get('customer_id');
                                $shipping_id=Session::get('shipping_id');
                                if ($customer_id != NULL && $shipping_id==NULL) {
                                 
                                    ?>
                                    <li><a href="{{URL::to('checkout')}}"><i class="fa fa-credit-card"></i> Thanh Toán</a></li>
                                 
                                <?php
                                }elseif($customer_id != NULL && $shipping_id!=NULL){
                                    ?>
                                <li><a href="{{URL::to('payment')}}"><i class="fa fa-credit-card"></i> Thanh Toán</a></li>
                                <?php
                                }else{
                                ?>
                                 <li><a href="{{URL::to('login-checkout')}}"><i class="fa fa-credit-card"></i> Thanh Toán</a></li>
                                <?php
                                }
                                ?>
                                <li><a href="{{URL::to('show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                                
                                {{-- <li><a href="cart.html"><i class="fa fa-bell"></i> Lịch sử đơn hàng</a></li> --}}
                                <?php 
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                    # code...
                                    ?>
                                    <li><a href="{{URL::to('logout-checkout')}}"><i class="fa fa-sign-out"></i>Đăng Xuất</a></li>
                                <?php
                                }else{
                                    ?>
                                <li><a href="{{URL::to('login-checkout')}}"><i class="fa fa-sign-in"></i>Đăng Nhập</a></li>
                                <?php
                                }
                                ?>
                                    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('trang-chu')}}" class="active">Trang Chủ</a></li>
                                <li ><a href="#">Tin Tức <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                        @foreach($cate_post as $key => $post)
                                        <li><a href="{{URL::to('danh-muc-bai-viet/'.$post->category_post_slug)}}">{{$post->category_post_name}}</a></li>
                                    @endforeach  
                                    </ul>
                                </li> 
                                
                                <li><a href="{{URL::to('contact')}}">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('search')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords" placeholder="tìm kiếm sản phẩm"/>
                                <input type="submit" style="width: 27%;border-radius: 7px; margin-top:0px;color:black" value="tìm kiếm" name="search_items" class="btn btn-primary btn-small">
                            </div>
                        </div></form>
                        
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Liên Hệ Với Chúng Tôi</h2>
                    <div id="gmap" class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.518703923747!2d105.81917361476303!3d21.01192158600752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7dbe998e37%3A0x11cbb19d65fb8af6!2zMTIyIFRow6FpIEjDoCwgVHJ1bmcgTGnhu4d0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpIDEwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1630201219859!5m2!1svi!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Gửi Phản Hồi</h2>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put("message",null);
                        }
                        ?>
                       
                   
                        <form method="POST" action="">
                  
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Họ và tên:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Số điện thoại:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Tiêu đề:</strong>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Nội Dung Gửi:</strong>
                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                   
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Thông Tin liên lạc </h2>
                        <address>
	    					<p><i class="fa fa-institution fa-2x" style="color: aquamarine;"> </i><span style="font-weight:900;font-size: 30px;"> PSP-BOOK</span></p>
							<p><i class="fa fa-map-marker fa-1x" > </i> : 122 Thái Hà, Trung Liệt, Đống Đa, Hà Nội </p>
							
							<p><i class="fa fa-phone" ></i> : 0814.515.062</p>
							<p><i class="fa fa-envelope-open" ></i > : pspbookk@gmail.com</p>
	    				</address>
                        <div class="social-networks">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FNh%25C3%25A0-s%25C3%25A1ch-Ph%25C6%25B0%25C6%25A1ng-Mai-100276445110239&tabs=timeline&width=300&height=300&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/#contact-page-->

    <footer id="footer"><!--Footer-->
        <hr><div class="footer-top">
      
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row ">
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Hỗ Trợ-Dịch Vụ</h2>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a href="# ">Mua hàng trả góp</a></li>
                                <li><a href="# ">Chính sách bảo hành</a></li>
                                <li><a href="# ">Tra cứu đơn hàng</a></li>
                                <li><a href="# ">Chính sách bảo mật</a></li>
                                <li><a href="# ">Điều khoản mua bán hàng hóa</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Thông Tin Liên Hệ</h2>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a href="# ">Bán hàng Online</a></li>
                                <li><a href="# ">Chăm sóc Khách Hàng</a></li>
                                <li><a href="# ">Hỗ Trợ Kỹ thuật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Hệ thống 75 siêu thị trên toàn quốc
                            </h2>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a href="# ">Danh sách 75 siêu thị trên toàn quốc</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Thanh toán miễn phí</h2>
                            
                            <table>
                                <tr>
                                    <td><img src="{{asset('public/frontend/images/shop/thanhtoan/bidv.png')}}" style=" width: 100%; height:50px;padding: 5px; " alt=""></td>
                                    <td><img src="{{asset('public/frontend/images/shop/thanhtoan/icon-vnpay.png')}}" style=" width: 100%; height:50px; padding: 5px;" alt=""></td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('public/frontend/images/shop/thanhtoan/visa.png')}}" alt="" style=" width: 100%; height:50px; padding: 5px; "></td>
                                    <td><img src="{{asset('public/frontend/images/shop/thanhtoan/zalopay.png')}}" alt="" style=" width: 100%; height:50px; padding: 5px; "></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1 ">
                        <div class="single-widget ">
                            <h2>Đăng ký nhận tin</h2>
                            <form action="# " class="searchform ">
                                <input type="text " placeholder="Email của bạn ........." />
                                <button type="submit " class="btn btn-default "><i class="fa fa-arrow-circle-o-right "></i></button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p style="width:306px; margin: auto">Copyright © 2021.Phong_Sơn_Phương</p>
                   
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('public/frontend/js/jquery.js')}} "></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}} "></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}} "></script>
    <script src="{{asset('public/frontend/js/price-range.js')}} "></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}} "></script>
    <script src="{{asset('public/frontend/js/main.js')}} "></script>
    
</body>

</html>