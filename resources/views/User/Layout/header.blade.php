<!DOCTYPE html>
<html lang="en">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('front_assets/img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LPShop</title>
    @livewireStyles
    <!-- Font awesome -->
    <link href="{{ asset('front_assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('front_assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('front_assets/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('front_assets/css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- <link id="switcher" href="front_assets/css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('front_assets/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
    @livewireScripts
   <!-- wpf loader Two -->
    {{-- <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> --}}
    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  {{-- <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="{{ asset('front_assets/img/flag/english.jpg') }}" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="{{ asset('front_assets/img/flag/french.jpg') }}" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="{{ asset('front_assets/img/flag/english.jpg') }}" alt="">ENGLISH</a></li>
                    </ul>
                  </div> --}}
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  {{-- <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div> --}}
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p>Liên hệ với chúng tôi tại: &nbsp;<span class="fa fa-phone"></span>09-24-24-1299</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  

                    @if (Auth::user())
                    <li class="hidden-xs"> Xin chào, {{Auth::user()->name}}</li>
                    <li class="hidden-xs"><a href="#"></a></li>
                    <li class="hidden-xs"><a href="{{ route('showListDonHangUser')}}">Danh sách đơn hàng</a></li>
                    <li class="hidden-xs"><a href="{{ route('showListLichSuDonHangUser')}}">Lịch sử đơn hàng</a></li>
                    <li class="hidden-xs"><a href="{{ url('cart') }}">Giỏ hàng</a></li>
                    <li class="hidden-xs"><a href="{{ route('user.dangXuatUser')}}">Đăng Xuất</a></li>
                    @else
                    <li class="hidden-xs"><a href="" data-toggle="modal" data-target="#login-modal">Đăng Nhập</a></li>
                    @endif
                    
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{ url('') }}">
                  
                  <p> <img src="{{ asset('front_assets/img/favicon.png') }}" style="width: 60px;height: 57px; object-fit: cover;" alt=""> LP<strong>SHOP</strong> <span> Chuyên bán các thiết bị PSN </span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="front_assets/img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{ url('cart') }}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">GIỎ HÀNG</span>



                  <span class="aa-cart-notify">{{$cart}}</span>

                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                      <?php
                      $tongtien=0;
                        ?>
                    @if ($cartgiohang)
                    @foreach ($cartgiohang as $giohang )


                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="/product_images/{{$giohang->TenHinhAnh}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{$giohang->TenSanPham}}</a></h4>
                        <p>Số lượng: {{$giohang->soluong}}</p>
                        <p>Giá: {{number_format($giohang->DonGia, 0, '', '.')}} VND</p>
                      </div>
                      <a class="aa-remove-product" href="{{route('xoaSanPhamKhoiGioHang',['id'=>$giohang->id])}}"><span class="fa fa-times"></span></a>
                    </li>


                    <?php
                    $tongtien+=$giohang->DonGia*$giohang->soluong;
                    ?>

                        @endforeach
                    @else
                        <li>Chưa có sản phẩm trong giỏ hàng</li>
                    @endif


                        <li>
                            <span class="aa-cartbox-total-title">
                              Total
                            </span>
                            <span class="aa-cartbox-total-price">
                                <?php
                                echo number_format($tongtien, 0, '', '.');
                                ?> VND
                            </span>
                          </li>
                  </ul>
                  @if (auth()->user())
                    @if (!$cartgiohang->isEmpty())
                      <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('checkout') }}">Thanh Toán</a>
                    @endif
                  @endif
                    
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form type="get" action="{{ route('TimKiemSanPham') }}">
                  <input type="text" name="query" id="" placeholder="Nhập sản phẩm cần tìm ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->

