<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thông tin thanh toán</title>
        <link href="{{asset('public/vnpay/bootstrap.min.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link href="{{asset('public/vnpay/main.css')}}" rel="stylesheet">  
        <!-- Custom styles for this template -->
        <link href="{{asset('public/vnpay/jumbotron-narrow.css')}}" rel="stylesheet">  
        <script src="{{asset('public/vnpay/jquery-1.11.3.min.js')}}"></script>
    </head>
    <body >
       
        <!--Begin display -->
        <div class="container">
            <table>  
                <tbody>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <?php
                        $message = Session::get('message');
                        if($message){
                            
                            echo "<p style='color:red; text-align: center;  font-size: 30px;  text-transform: capitalize;'>" . $message. "</p>";

                            Session::put("message",null);
                        }
                        ?>
                
                    <p style='color:rgb(0, 255, 13); text-align: center;  font-size: 50px;  text-transform: capitalize;'><i class="fa fa-check-circle-o"></i></p>
                        </td>
                    </tr>
                    <tr>
                        <td  class="td-title">Mã giao dịch tại VNPAY</td>
                        <td>{{$vnpayData['vnp_TransactionNo']}}</td>
                        
                    </tr>
                    <tr>
                        <td class="td-title">Mã đơn hàng</td>
                        <td>{{$vnpayData['vnp_TxnRef']}}</td>
                        
                    </tr>
                    <tr>
                        <td class="td-title">Mã ngân hàng</td>
                        <td>{{$vnpayData['vnp_BankCode']}}</td>
                        
                    </tr>
                    <tr>
                        <td class="td-title">Số Tiền thanh toán</td>
                        <td>{{ number_format($vnpayData['vnp_Amount'] / 100,0,',','.') }} VNĐ</td>
                    </tr>
                    <tr>
                        <td class="td-title">Nội dung thanh toán</td>
                        <td>{{$vnpayData['vnp_OrderInfo']}}</td>
                    </tr>
                    <tr>
                        <td class="td-title">Thời gian thanh toán</td>
                        <td>{{date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate']))}}</td>
                    </tr>
                    <tr>
                        <td class="td-title">
                            Kết quả
                        </td>
                        <td >
                            GD thành công
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="td-a">
                            <a href="{{URL::to('trang-chu')}}">
                                <button class="custom-btn btn-15">Tiếp Tục Mua Sắm</button>
                            </a>
                        </td>
                        
                    </tr>
                   
                </tbody>
            </table>

        </div>  
        <footer id="footer"><!--Footer-->
            <div class="footer-top">
           
            </div>
            
           
            
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p style="width:306px; margin: auto">Copyright © 2021.Phong_Sơn_Phương</p>
                       
                    </div>
                </div>
            </div>
            
        </footer><!--/Footer-->
    </body>
</html>
