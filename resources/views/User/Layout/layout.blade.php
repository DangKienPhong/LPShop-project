 @include('User.Layout.header')
 <!-- menu -->
 <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->

            <ul class="nav navbar-nav">
              <li><a href="{{ url('') }}">Trang chủ</a></li>
                @forelse ($listTenDanhMuc as $DanhMuc)

              {{-- <li><a href="{{ url('home') }}">Home</a></li> --}}

              <li><a href="{{ route('showListSanPhamTheoDanhMucLon', ['id'=> $DanhMuc->TenDanhMuc]) }}">{{$DanhMuc->TenDanhMuc}}<span class="caret"></span></a>

                <ul class="dropdown-menu">
                        @foreach ($listDanhMuc as $DanhMucCon )
                            @if($DanhMuc->TenDanhMuc==$DanhMucCon->TenDanhMuc)

                        <li><a href="{{ route('showListSanPhamTheoDanhMuc', ['id'=> $DanhMucCon->id]) }}">{{$DanhMucCon->TenDanhMucCon}}</span></a>
                        @endif
                        @endforeach
                  {{-- <li><a href="#">Sports</a></li>
                  <li><a href="#">Formal</a></li>
                  <li><a href="#">Standard</a></li>
                  <li><a href="#">T-Shirts</a></li>
                  <li><a href="#">Shirts</a></li>
                  <li><a href="#">Jeans</a></li>
                  <li><a href="#">Trousers</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>
                    </ul>
                  </li> --}}
                </ul>
              </li>
              @empty
              <li>Chưa có dữ liệu trong database</li>
              @endforelse
              <li><a href="{{ url('contact') }}">Liên hệ</a></li>
              <li><a href="{{ url('multi-option-search') }}">Tìm kiếm nâng cao</a></li>
              {{-- <li><a href="#">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="product.html">Shop Page</a></li>
                  <li><a href="product-detail.html">Shop Single</a></li>
                  <li><a href="404.html">404 Page</a></li>
                </ul>
              </li> --}}
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->
  @yield('content')
  {{-- @include('User.Layout.subcribe') --}}
@include('User.Layout.footer')
