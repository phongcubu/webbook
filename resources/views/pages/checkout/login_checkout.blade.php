@extends('welcome')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Đăng Nhập</h2>
                    <form action="{{URL::to('login-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="email_account" placeholder="Tên tài khoản" />
                        <input type="password" name="password_account" placeholder="Mật khẩu" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Nhớ mật khẩu
                        </span>
                        <button type="submit" class="btn btn-default">Đăng Nhập</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Đăng Ký Tài Khoản Mới!</h2>
                    <form action="{{URL::to('add-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="customer_name" placeholder="Họ và tên " />
                        <input type="email" name="customer_email" placeholder="Email" />
                        <input type="password" name="customer_password" placeholder="Password" />
                        <input type="text" name="customer_phone" placeholder="số điện thoại" />
                        <button type="submit" class="btn btn-default">Đăng Ký</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection