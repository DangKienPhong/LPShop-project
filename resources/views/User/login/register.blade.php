@extends("User.Layout.layout")
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>Tài khoản</h2>
         <ol class="breadcrumb">
            <li><a href="{{ url('') }}">Trang chủ</a></li>
           <li class="active">Tài khoản</li>
         </ol>
       </div>
      </div>
    </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Đăng nhập</h4>
                 <form action="{{ route('user.xacNhanUser') }}" method="POST" class="aa-login-form"  autocomplete="off">
                  @csrf
                  @if (Session::get('error'))
                      <div class="alert alert-danger">
                          {{Session::get('error')}}
                      </div>
                  @endif
                  <label for="">Email<span>*</span></label>
                  <input type="text" placeholder="Hãy nhập email" name="email" value="{{old('email')}}">
                  <span style="color:red" class="help-block">
                    @error('email')
                        {{$message}}
                    @enderror
                  </span>
                  <label for="">Password<span>*</span></label>
                  <input type="password" placeholder="Hãy nhập Password" name="password" value="{{old('password')}}">
                  <span style="color:red" class="help-block">
                      @error('password')
                          {{$message}}
                      @enderror
                  </span>
                  <button type="submit" class="aa-browse-btn">Đăng nhập</button>
                    {{-- <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> --}}
                    {{-- <p class="aa-lost-password"><a href="#">Lost your password?</a></p> --}}
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                 <h4>Đăng ký</h4>
                 <form  action="{{ route('user.luuUser') }}" method="post" class="aa-login-form">
                    @csrf
                    @if (Session::get('success'))
                            <div class="alert alert-success">
                              {{Session::get('success')}}
                            </div>
                    @endif
                    @if (Session::get('register-error'))
                            <div class="alert alert-danger">
                              {{Session::get('register-error')}}
                            </div>
                    @endif
                    <label for="">Tên đăng nhập<span>*</span></label>
                    <input type="text" placeholder="Tên user" name="name" value="{{old('name')}}">
                    <span style="color:red" class="help-block">
                      @error('name')
                          {{$message}}
                      @enderror
                    </span>
                    <label for="">Email address<span>*</span></label>
                    <input type="email"  name="email" placeholder="Email" value="{{old('email')}}">
                    <span style="color:red" class="help-block">
                      @error('email')
                          {{$message}}
                      @enderror
                    </span>
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password" value="{{old('password')}}">
                    <span style="color:red" class="help-block">
                      @error('password')
                          {{$message}}
                      @enderror
                    </span>
                    <label for="">Xác nhận Password<span>*</span></label>
                    <input type="password" placeholder="Xác nhận Password" name="cpassword" value="{{old('cpassword')}}">
                    <span style="color:red" class="help-block">
                      @error('cpassword')
                          {{$message}}
                      @enderror
                    </span>
                    <label for="">Địa chỉ<span>*</span></label>
                    <input type="text" placeholder="Địa chỉ" name="address" value="{{old('address')}}">
                    <span style="color:red" class="help-block">
                      @error('address')
                          {{$message}}
                      @enderror
                    </span>
                    <label for="">Số điện thoại<span>*</span></label>
                    <input type="tel" placeholder="Số điện thoại" name="phone" value="{{old('phone')}}">
                    <span style="color:red" class="help-block">
                      @error('phone')
                          {{$message}}
                      @enderror
                    </span>
                    <button type="submit" class="aa-browse-btn">Đăng ký</button>
                  </form>
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 @endsection
