<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Dashboard|Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/> -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="">
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- filter table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- //font-awesome icons -->
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<!-- <script src="{{asset('public/backend/js/raphael-min.js')}}"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('trang-chu')}}" class="logo">
        PSP-BOOK
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/images/2.png')}}">
                <span class="username">
					<?php
					use Illuminate\Support\Facades\Session;
					//  hiển thị tên người đăng nhập
						$name = Session::get('admin_name');
						if($name)
						{
							echo $name;
						}

					?>
				</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Thông Tin</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>Cài Đặt</a></li>
                <li><a href="{{URL::to('logout')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('dashboard/')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Đơn hàng </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('manage-order')}}">	Quản lý đơn hàng</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Khách hàng </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('all-user')}}">	Quản lý khách hàng</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                        
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bank"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>
                        
                    </ul>
                </li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-archive"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('all-product')}}">Liệt kê sản phẩm</a></li>
                        
                    </ul>
                </li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-book"></i>
						<span>Danh Mục Bài Viết</span>
					</a>
					<ul class="sub">
						<li><a href="{{URL::to('add-category-post')}}">Thêm danh mục bài viết</a></li>
						<li><a href="{{URL::to('all-category-post')}}">Liệt kê danh mục bài viết</a></li>
						
					</ul>
				</li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Bài Viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('add-post')}}">Thêm bài viết</a></li>
						<li><a href="{{URL::to('all-post')}}">Liệt kê bài viết</a></li>
                        
                    </ul>
                </li>
            </ul>    
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
<!-- footer -->
		<div class="footer">
			<div class="wthree-copyright">
			<p>© 2021 Phong-Sơn-Phương. All rights reserved | Design by <a href="">D14TTNT&TGMT</a></p>
			</div>
		</div>
<!-- / footer -->
	</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('public/backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
		jQuery('.small-graph-box').hover(function() {
		jQuery(this).find('.box-button').fadeIn('fast');
		}, function() {
		jQuery(this).find('.box-button').fadeOut('fast');
		});
		jQuery('.small-graph-box .box-close').click(function() {
		jQuery(this).closest('.small-graph-box').fadeOut(200);
		return false;
		});
	    //CHARTS
		function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(function(){
			$("#datepicker").datepicker({
				prevText:"Tháng trước",
				nextText:"Tháng sau",
				dateFormat:"yy-mm-dd",
				dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
				duration:"slow"
			});
			$("#datepicker2").datepicker({
				prevText:"Tháng trước",
				nextText:"Tháng sau",
				dateFormat:"yy-mm-dd",
				dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
				duration:"slow"
			});
		}
		);
	</script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->

 <!-- preview img  -->
	<script>
		function previewFile(input)
		{
			var file =$(".image-preview").get(0).files[0];
			console.log(file)
			if(file)
			{
				var read = new FileReader();
				read.onload = function(){
					$('#previewImg').attr("src", read.result);
				}
				read.readAsDataURL(file);
			}
		}
	</script>
	<script type="text/javascript">
		function ChangeToSlug()
			{
				var slug;
				//Lấy text từ thẻ input title 
				slug = document.getElementById("slug").value;
				slug = slug.toLowerCase();
				//Đổi ký tự có dấu thành không dấu
					slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
					slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
					slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
					slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
					slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
					slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
					slug = slug.replace(/đ/gi, 'd');
					//Xóa các ký tự đặt biệt
					slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
					//Đổi khoảng trắng thành ký tự gạch ngang
					slug = slug.replace(/ /gi, "-");
					//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
					//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
					slug = slug.replace(/\-\-\-\-\-/gi, '-');
					slug = slug.replace(/\-\-\-\-/gi, '-');
					slug = slug.replace(/\-\-\-/gi, '-');
					slug = slug.replace(/\-\-/gi, '-');
					//Xóa các ký tự gạch ngang ở đầu và cuối
					slug = '@' + slug + '@';
					slug = slug.replace(/\@\-|\-\@|\@/gi, '');
					//In slug ra textbox có id “slug”
				document.getElementById('convert_slug').value = slug;
			}
			
	</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

 
<script type="text/javascript">
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>
</body>
</html>
