 <!-- footer -->
 <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Giới thiệu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="{{ url('') }}">Trang chủ</a></li>
                    <li><a href="#">Máy Chơi Game</a></li>
                    <li><a href="#">Thẻ Game</a></li>
                    <li><a href="#">Phụ Kiện</a></li>
                    <li><a href="{{ url('contact') }}">Liên Hệ</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên hệ</h3>
                    <address>
                      <p><span class="fa fa-home"></span> 180 Cao Lỗ, Phường 4, Quận 8, TP. Hồ Chí Minh.</p>
                      <p><span class="fa fa-phone"></span>0924241299</p>
                      <p><span class="fa fa-envelope"></span>dangkienphong555@gmail.com</p>
                      <p><span class="fa fa-envelope"></span>phamtienlong135@gmail.com</p>
                    </address>

                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Theo dõi chúng tôi tại</h3>

                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    {{-- <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer> --}}
  <!-- / footer -->

  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Đăng Nhập</h4>
          <form class="aa-login-form" action="{{ route('user.xacNhanUser') }}" method="POST" autocomplete="off">
            @csrf
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

            <button class="aa-browse-btn" type="submit">Đăng nhập</button>
            {{-- <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p> --}}
            <div class="aa-register-now">
               Chưa có Tài khoản ?<a href="{{ route('user.register') }}">Hãy đăng ký tại đây !</a>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  @yield('scripts')


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('front_assets/js/bootstrap.js') }}"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{ asset('front_assets/js/jquery.smartmenus.js') }}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{ asset('front_assets/js/jquery.smartmenus.bootstrap.js') }}"></script>
  <!-- To Slider JS -->
  <script src="{{ asset('front_assets/js/sequence.js') }}"></script>
  <script src="{{ asset('front_assets/js/sequence-theme.modern-slide-in.js') }}"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="{{ asset('front_assets/js/jquery.simpleGallery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('front_assets/js/jquery.simpleLens.js') }}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{ asset('front_assets/js/slick.js') }}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ asset('front_assets/js/nouislider.js') }}"></script>
  <!-- Custom js -->
  <script src="{{ asset('front_assets/js/custom.js') }}"></script>

  </body>
</html>
