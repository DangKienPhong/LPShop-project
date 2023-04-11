@extends("User.Layout.layout")
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Thanh toán</h2>
        <ol class="breadcrumb">
          <li><a href="{{ url('') }}">Trang chủ</a></li>
          <li class="active">Thanh toán</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->

 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">

        <div class="checkout-area">
            {{-- <form action="{{ route('luuDonHang')}}" method="POST"> --}}
            <form action="{{ route('guiThongTinThanhToan')}}" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-8">
                    <div class="checkout-left">
                    <div class="panel-group" id="accordion">
                        <!-- Coupon section -->
                        {{-- <div class="panel panel-default aa-checkout-coupon">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Have a Coupon?
                            </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <input type="text" placeholder="Coupon Code" class="aa-coupon-code">
                            <input type="submit" value="Apply Coupon" class="aa-browse-btn">
                            </div>
                        </div>
                        </div> --}}
                        <!-- Login section -->
                        {{-- <div class="panel panel-default aa-checkout-login">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Client Login
                            </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
                            <input type="text" placeholder="Username or email">
                            <input type="password" placeholder="Password">
                            <button type="submit" class="aa-browse-btn">Login</button>
                            <label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                            </div>
                        </div>
                        </div> --}}



                        <!-- Billing Details -->

                        <div class="panel panel-default aa-checkout-billaddress">

                        <div class="panel-heading">
                            <h4 class="panel-title">

                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Điền thông tin thanh toán
                                  </a>

                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" name="name" placeholder="Họ tên*"
                                    @if (Auth::user())
                                        value="{{Auth::user()->name}}"
                                    @endif >
                                    <span style="color:red" class="help-block">
                                        @error('name')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="email" name="email" placeholder="Email Address*" 
                                    @if (Auth::user())
                                        value="{{Auth::user()->email}}"
                                    @endif >
                                    <span style="color:red" class="help-block">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="tel"name="phone" placeholder="Phone*"
                                    @if (Auth::user())
                                        value="{{Auth::user()->phone}}"
                                    @endif >
                                    <span style="color:red" class="help-block">
                                        @error('phone')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <textarea cols="8" name="diachi"rows="3" placeholder="Địa chỉ giao hàng">@if (Auth::user()){{Auth::user()->address}}@endif</textarea>
                                    <span style="color:red" class="help-block">
                                        @error('diachi')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <textarea cols="8" name="ghichu"rows="3" placeholder="Nhập ghi chú"></textarea>
                                    <span style="color:red" class="help-block">
                                        @error('ghichu')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <textarea cols="8" name="phuongthuc"rows="3">Phương thức</textarea>
                                    <span style="color:red" class="help-block">
                                        @error('phuongthuc')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div> --}}

                            {{-- <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <select>
                                    <option value="0">Select Your Country</option>
                                    <option value="1">Australia</option>
                                    <option value="2">Afganistan</option>
                                    <option value="3">Bangladesh</option>
                                    <option value="4">Belgium</option>
                                    <option value="5">Brazil</option>
                                    <option value="6">Canada</option>
                                    <option value="7">China</option>
                                    <option value="8">Denmark</option>
                                    <option value="9">Egypt</option>
                                    <option value="10">India</option>
                                    <option value="11">Iran</option>
                                    <option value="12">Israel</option>
                                    <option value="13">Mexico</option>
                                    <option value="14">UAE</option>
                                    <option value="15">UK</option>
                                    <option value="16">USA</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" placeholder="Appartment, Suite etc.">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" placeholder="City / Town*">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" placeholder="District*">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" placeholder="Postcode / ZIP*">
                                </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                        </div>

                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkout-right">
                    <h4>Đơn hàng của bạn</h4>

                    <div class="aa-order-summary-area">
                        <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th>Tên sản phẩm</th>
                            <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <?php
                        $tongtien=0;
                        ?>
                        @forelse ($cartgiohang as $cart )
                        <tbody>
                            <tr>
                            <td>{{$cart->TenSanPham}} <strong> x  {{$cart->soluong}} </strong></td>
                            <td>{{number_format($cart->DonGia*$cart->soluong, 0, '', '.')}} VND</td>
                            </tr>

                        </tbody>
                        <?php
                        $tongtien+=$cart->DonGia*$cart->soluong;
                        ?>
                        @empty
                        <td>Chưa có sản phẩm trong giỏ hàng</td>
                        @endforelse
                        <tfoot>


                            <tr>
                            <th>Tổng hóa đơn</th>
                            <td>
                                {{-- <input  name="ThanhTien" value=" VND" readonly=""> --}}
                                <?php echo number_format($tongtien, 0, '', '.'); ?> VND
                                <input type="hidden"  name="ThanhTien" value="{{$tongtien}}" >
                            </td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>


                    <h4>Phương thức thanh toán</h4>
                    <div class="aa-payment-method">
                        
                        <button type="submit" name="ThanhToan" value="COD" class="aa-browse-btn">Đặt hàng và thanh toán khi nhận hàng</button>
                        <br>
                        <br>
                        <button type="submit" name="ThanhToan" value="VNPAY" class="aa-browse-btn">Đặt đơn hàng và thanh toán với VNPAY</button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
         </div>
       </div>
     </div>
   </div>

 </section>

 <!-- / Cart view section -->

 @endsection
