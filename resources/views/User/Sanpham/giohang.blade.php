@extends("User.Layout.layout")
@section('content')
 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>Giỏ hàng</h2>
         <ol class="breadcrumb">
            <li><a href="{{ url('') }}">Trang chủ</a></li>
           <li class="active">Giỏ hàng</li>
         </ol>
       </div>
      </div>
    </div>
   </section>
   <!-- / catg header banner section -->

  <!-- Cart view section -->
  <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
              @if (session('success'))
                <div class="alert alert-success">
                  <h2>{{session('success')}}</h2>
                  <p>Đơn hàng của bạn đã được xử lý !</p>
                </div>

              @endif
              @if (session('fail'))
                        <div class="alert  alert-danger" >
                          <h2>{{session('fail')}}</h2>
                          <p>Bạn hãy kiểm tra lại thông tin nhé</p>
                        </div>
                      @endif
            <div class="cart-view-table">

                <div class="table-responsive">
                   <table class="table">
                     <thead>
                       <tr>
                         <th></th>
                         <th></th>
                         <th>Tên sản phẩm</th>
                         <th>Đơn giá</th>
                         <th>Số lượng</th>
                         <th>Tổng tiền</th>
                         <th></th>
                       </tr>

                     </thead>
                     <tbody>
                        <?php
                        $tongtien=0;
                          ?>
                      @if ($cartgiohang)
                      @forelse ($cartgiohang as $giohang )
                         <form method="POST" action="{{ route('updateSoluongsanpham', ['id'=>$giohang->id]) }}">
                            @csrf

                       <tr>

                                    <td><a class="remove" href="{{route('xoaSanPhamKhoiGioHang',['id'=>$giohang->id])}}"><fa class="fa fa-close"></fa></a></td>
                                    <td><a href="#"><img src="/product_images/{{$giohang->TenHinhAnh}}" alt="img"></a></td>
                                    <td><a class="aa-cart-title" href="#">{{$giohang->TenSanPham}}</a></td>
                                    <td>{{number_format($giohang->DonGia, 0, '', '.')}} VND</td>
                                    <td> <input class="aa-cart-quantity" name="soluong" type="number" value="{{$giohang->soluong}}"></td>
                                    <td> <a class="aa-cart-title" href="#">{{number_format($giohang->DonGia*$giohang->soluong, 0, '', '.')}} VNĐ </a></td>
                                    <td><button class="aa-add-to-cart-btn" type="submit" >Cập nhật số lượng</button></td>

                       </tr>
                    </form>
                       <?php
                       $tongtien+=$giohang->DonGia*$giohang->soluong;
                       ?>
                        @empty
                        <td>Chưa có sản phẩm trong giỏ hàng</td>
                     @endforelse
                     @else
                         <td>Chưa có sản phẩm trong giỏ hàng</td>
                     @endif



                       {{-- <tr>
                         <td colspan="7" class="aa-cart-view-bottom">
                           <div class="aa-cart-coupon">
                             <input class="aa-coupon-code" type="text" placeholder="Coupon">
                             <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                           </div>
                           <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                         </td>
                       </tr> --}}
                       </tbody>
                   </table>
                 </div>

              <!-- Cart Total view -->
              <div class="cart-view-total">
                <h4>Tổng đơn hàng</h4>
                <table class="aa-totals-table">
                  <tbody>
                    <tr>
                      <th>Tổng tiền</th>
                      <td> <?php
                        echo number_format($tongtien, 0, '', '.');
                        ?> VND</td>
                    </tr>
                  </tbody>
                </table>
                @if (!$cartgiohang->isEmpty())
                <a href="{{ url('checkout') }}" class="aa-cart-view-btn">Tiến hành thanh toán</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->


   @endsection
