<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
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
</head><!--/head-->

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
                                
                                <li><a href="{{URL::to('admin-login')}}"><i class="fa fa-user"></i> Admin</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Yêu Thích</a></li>
                                <li><a href="checkout.html"><i class="fa fa-credit-card"></i> Thanh Toán</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                                {{-- <li><a href="cart.html"><i class="fa fa-bell"></i> Lịch sử đơn hàng</a></li> --}}
                                <li><a href="login.html"><i class="fa fa-sign-in"></i>Đăng Nhập</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out"></i>Đăng Xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
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
                                <li class="dropdown"><a href="#">Sản Phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin Tức</a></li> 
                                
                                <li><a href="contact-us.html">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="tìm kiếm"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <h1><span>PSP</span>-BOOK</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Bắt đầu mua</button>
                                </div>
                                <div class="col-sm-8">
                                    <img src="{{asset('public/frontend/images/shop/baner/banner2.jpg')}}" class="girl img-responsive" alt="" />
                                   
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <h1><span>PSP</span>-BOOK</h1>
                                    <h2>100% MẪU SÁCH ĐƯỢC CHỌN LỰA TỐT NHẤT</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Bắt đầu mua</button>
                                </div>
                                <div class="col-sm-8">
                                    <img src="{{asset('public/frontend/images/shop/baner/banner1.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/shop/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-4">
                                    <h1><span>PSP</span>-BOOK</h1>
                                    <h2>Thư Viện ĐỌ</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Bắt đầu mua</button>
                                </div>
                                <div class="col-sm-8">
                                    <img src="{{asset('public/frontend/images/shop/baner/banner3.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('public/frontend/images/home/pricing.png')}}" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $cate)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                            @foreach($brand as $key => $brand)
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
                                    
                                </ul>
                                @endforeach
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-3  ">
                            <div class="video-gallery text-center ">
                                <a href="# ">

                                    <img src="{{asset('public/frontend/images/shop/thutuczip/chinhhang.png')}}" style=" width: 100px; height: 100px; border-radius: 50%;" alt=" " />

                                    <p>sản phẩm</p>
                                    <h2 style="font-weight: 500; font-size: 16px;"> Chính Hãng</h2>

                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <div class="video-gallery text-center ">
                                <a href="# ">

                                    <img src="{{asset('public/frontend/images/shop/thutuczip/freeship.png')}}" style=" width: 100px; height: 100px; border-radius: 50%;" alt=" " />

'
                                </a>
                                <p>miễn phí</p>
                                <h2 style="font-weight: 500; font-size: 16px;">Toàn Quốc</h2>
                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <div class="video-gallery text-center ">
                                <a href="# ">

                                    <img src="{{asset('public/frontend/images/shop/thutuczip/hotline.png')}}" style=" width: 100px; height: 100px; border-radius: 50%;" alt=" " />


                                </a>
                                <p>
                                    Hotline hỗ trợ</p>
                                <h2 style="font-weight: 500; font-size: 16px;">1900.2091</h2>
                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <div class="video-gallery text-center ">
                                <a href="# ">

                                    <img src="{{asset('public/frontend/images/shop/thutuczip/doitra.png')}}" style=" width: 100px; height: 100px; border-radius: 50%;" alt=" " />

                                </a>
                                <p>
                                    Thủ tục đổi trả</p>
                                <h2 style="font-weight: 500; font-size: 16px;">DỄ DÀNG</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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