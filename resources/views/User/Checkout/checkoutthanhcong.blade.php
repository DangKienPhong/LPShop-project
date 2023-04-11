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

                <h2 style="color:green;">Đơn hàng đã được đặt thành công !</h2>
                <br>

                    {{-- <h3 style="color:green;">Quét mã để thanh toán</h3>
                    <img src="{{ asset('front_assets/img/Capture.png') }}" style="max-width:100%;height: auto;" alt="fashion img"> --}}


                <h3>Bạn có thể trở về trang để khám phá các sản phẩm khác nhé ! </h3>
                <br>
                <div class="aa-payment-method">

                    <a href="{{ url('') }}" class="aa-browse-btn">Tiếp tục mua sắm</a>
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
                         <th>Số lượng sản phẩm</th>
                         <th>Phương thức thanh toán</th>
                         <th>Tổng tiền</th>
                         <th>Xem chi tiết</th>
                       </tr>
                     </thead>
                     <tbody>

                      <tr>
                        <td><a class="aa-cart-title" href="#">{{$DonHang->id}}</a></td>
                        <td>{{$DonHang->chitiet->count()}}</td>
                        <td>
                            <button disabled="" style="background-color: rgb(52, 183, 216); color: whitesmoke;font-family: bold;font-size: 18px;" >{{$DonHang->PhuongThucThanhToan}}</button></p>
                        </td>
                        <td><a class="aa-cart-title" href="#">{{number_format($DonHang->ThanhTien, 0, '', '.')}} VNĐ</a></td>
                        <td>
                            <a href="{{ route('showDetailDonHangUser', ['id'=>$DonHang->id]) }}" class="aa-add-to-cart-btn">Xem chi tiết</a>
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
