@extends("User.Layout.layout")
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Tìm kiếm nâng cao</h2>
        <ol class="breadcrumb">
          <li><a href="{{ url('') }}">Trang chủ</a></li>
          <li class="active">Tìm kiếm nâng cao</li>
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
            <form action="{{ route('FilterSanPhamUser')}}" method="POST">
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
                                    Điền thông tin tìm kiếm
                                  </a>

                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" name="TenSanPham" placeholder="Tên sản phẩm">
                                    <span style="color:red" class="help-block">
                                        @error('TenSanPham')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <div class="aa-checkout-single-bill">
                                        <select name="danh_muc_id">
                                            <option value="">Xin chọn danh mục của sản phẩm</option>
                                            @foreach ($listDanhMuc as $danhMuc)
                                                <option value="{{$danhMuc->id}}">{{$danhMuc->TenDanhMucCon}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span style="color:red" class="help-block">
                                        @error('danh_muc_id')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                    <select name="nha_cung_cap_id" id="select" class="form-control">
                                        <option value="">Xin chọn nhà cung cấp</option>
                                        @foreach ($listNhaCungCap as $nhaCungCap)
                                            <option value="{{$nhaCungCap->id}}">{{$nhaCungCap->TenNhaCungCap}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="help-block">
                                        @error('nha_cung_cap_id')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                
                                    <div class="aa-checkout-single-bill">
                                        <select name="HoTroBluetooth">
                                            <option value="">Sản phẩm có hỗ trợ Bluetooth ?</option>
                                            <option value="Có">Có hỗ trợ Bluetooth</option>
                                            <option value="Không">Không hỗ trợ Bluetooth</option>
                                        </select>
                                    </div>
                                    <span style="color:red" class="help-block">
                                        @error('HoTroBluetooth')
                                            {{$message}}
                                        @enderror
                                      </span>
                                
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" name="GPU" placeholder="Nhập tên GPU">
                                    <span style="color:red" class="help-block">
                                        @error('GPU')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" name="CPU" placeholder="Nhập tên CPU">
                                    <span style="color:red" class="help-block">
                                        @error('CPU')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" name="RAM" placeholder="Nhập lượng RAM cần có">
                                    <span style="color:red" class="help-block">
                                        @error('RAM')
                                            {{$message}}
                                        @enderror
                                      </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                    <input type="text" name="BoNhoTrong" placeholder="Nhập lượng Bộ nhớ trong cần có">
                                    <span style="color:red" class="help-block">
                                        @error('BoNhoTrong')
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
                    <h4>TÌM KIẾM SẢN PHẨM NÂNG CAO</h4>

                    <div class="aa-payment-method">
                        <p>Nhấn nút để tìm kiếm sau khi điền các thông tin bạn muốn tìm.</p>
                        <hr>
                        <button type="submit" class="aa-browse-btn">Tìm kiếm sản phẩm</button>
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
