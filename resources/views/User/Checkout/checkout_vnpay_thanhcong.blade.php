@extends("User.Layout.layout")
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

<section class="checkout spad">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
                <br>
                @if ($xacNhanThanhToan !=0)
                    <h2 style="color:green;">Đơn hàng đã được đặt thành công !</h2>
                    <br>
                    <h3>Bạn có thể trở về trang để khám phá các sản phẩm khác nhé ! </h3>
                    <br>
                    
                @else
                    <h2 style="color:rgb(128, 4, 0);">Thanh toán thất bại !</h2>
                    <br>
                    <h3>Quá trình thanh toán xảy ra lỗi, xin vui lòng thử lại sau </h3>
                    <br>
                    
                @endif
                <div class="aa-payment-method">

                    <a href="{{ url('') }}" class="aa-browse-btn">Trở về trang chủ</a>
                </div>
                <br>

                
                
            
            </div>

            </div>
        </div>
    </div>
</section>

<section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table aa-wishlist-table">
              <form action="">
                <div class="table-responsive">
                    <div class="cart-view-total">
                        <h4>Thông tin giao dịch</h4>
                    </div>
                   <table class="table">
                     <thead>
                       <tr>
                         <th>ID đơn hàng</th>
                         <th>Nội dung thanh toán</th>
                         <th>Mã giao dịch ở VNPAY</th>
                         <th>Ngân Hàng</th>
                         <th>Tổng tiền</th>
                         <th>Kết quả</th>
                         <th>Xem chi tiết</th>
                       </tr>
                     </thead>
                     <tbody>

                      <tr>
                        <td><a class="aa-cart-title" href="#"><?php echo $_GET['vnp_TxnRef'] ?></a></td>
                        <td><?php echo $_GET['vnp_OrderInfo'] ?></td>
                        <td>
                            <a class="aa-cart-title" href="#"><?php echo $_GET['vnp_TransactionNo'] ?></a>
                        </td>
                        <td><button disabled="" style="background-color: rgb(52, 216, 52); color: whitesmoke;font-family: bold;font-size: 18px;" ><?php echo $_GET['vnp_BankCode'] ?> </button></p></td>
                        <td><?php echo  number_format(($_GET['vnp_Amount']/100), 0, '', '.')?> VNĐ</td>
                        <td>
                            <?php
                                if ($secureHash == $vnp_SecureHash) {
                                    if ($_GET['vnp_ResponseCode'] == '00') {
                                        echo "<span style='color:green;'>Giao dịch thành công !</span>";
                                    } else {
                                        echo "<span style='color:red'>Giao dịch không thành công</span>";
                                    }
                                } else {
                                    echo "<span style='color:red'>Chữ ký không hợp lệ</span>";
                                }
                            ?>
                        </td>
                        <td>
                          <a href="{{ route('showDetailDonHangUser', ['id'=>  $_GET['vnp_TxnRef'] ]) }}" class="aa-add-to-cart-btn">Xem chi tiết</a>
                        </td>
                        

                      </tr>
                     

                  
                       </tbody>
                   </table>
                 </div>
              </form>             
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection
