<div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
    <aside class="aa-sidebar">
      <!-- single sidebar -->
      <div class="aa-sidebar-widget">
        <h3>Danh mục sản phẩm</h3>
        @forelse ($listTenDanhMuc as $DanhMuc)
        @foreach ($listDanhMuc as $DanhMucCon)
        @if($DanhMuc->TenDanhMuc==$DanhMucCon->TenDanhMuc)
        <ul class="aa-catg-nav">
          <li><a href="{{ route('showListSanPhamTheoDanhMuc', ['id'=> $DanhMucCon->id]) }}">{{ $DanhMucCon->TenDanhMucCon }}</a></li>

        </ul>
        @endif
        @endforeach

    @empty
    <li>Chưa có dữ liệu trong database</li>
    @endforelse
      </div>

      <!-- single sidebar -->
      {{-- <div class="aa-sidebar-widget">
        <h3>Tags</h3>

        <div class="tag-cloud">
          <a href="#">Fashion</a>
          <a href="#">Ecommerce</a>
          <a href="#">Shop</a>
          <a href="#">Hand Bag</a>
          <a href="#">Laptop</a>
          <a href="#">Head Phone</a>
          <a href="#">Pen Drive</a>
        </div>

      </div> --}}

      <!-- single sidebar -->
      {{-- <div class="aa-sidebar-widget">
        <h3>Shop By Price</h3>
        <!-- price range -->
        <div class="aa-sidebar-price-range">
         <form action="">
            <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
            </div>
            <span id="skip-value-lower" class="example-val">30.00</span>
           <span id="skip-value-upper" class="example-val">100.00</span>
           <button class="aa-filter-btn" type="submit">Filter</button>
         </form>
        </div>

      </div> --}}

      <!-- single sidebar -->
      {{-- <div class="aa-sidebar-widget">
        <h3>Shop By Color</h3>
        <div class="aa-color-tag">
          <a class="aa-color-green" href="#"></a>
          <a class="aa-color-yellow" href="#"></a>
          <a class="aa-color-pink" href="#"></a>
          <a class="aa-color-purple" href="#"></a>
          <a class="aa-color-blue" href="#"></a>
          <a class="aa-color-orange" href="#"></a>
          <a class="aa-color-gray" href="#"></a>
          <a class="aa-color-black" href="#"></a>
          <a class="aa-color-white" href="#"></a>
          <a class="aa-color-cyan" href="#"></a>
          <a class="aa-color-olive" href="#"></a>
          <a class="aa-color-orchid" href="#"></a>
        </div>
      </div> --}}

      <!-- single sidebar -->
      {{-- <div class="aa-sidebar-widget">
        <h3>Recently Views</h3>
        <div class="aa-recently-views">
          <ul>
            <li>
              <a href="#" class="aa-cartbox-img"><img alt="img" src="front_assets/img/woman-small-2.jpg"></a>
              <div class="aa-cartbox-info">
                <h4><a href="#">Product Name</a></h4>
                <p>1 x $250</p>
              </div>
            </li>
            <li>
              <a href="#" class="aa-cartbox-img"><img alt="img" src="front_assets/img/woman-small-1.jpg"></a>
              <div class="aa-cartbox-info">
                <h4><a href="#">Product Name</a></h4>
                <p>1 x $250</p>
              </div>
            </li>
             <li>
              <a href="#" class="aa-cartbox-img"><img alt="img" src="front_assets/img/woman-small-2.jpg"></a>
              <div class="aa-cartbox-info">
                <h4><a href="#">Product Name</a></h4>
                <p>1 x $250</p>
              </div>
            </li>
          </ul>
        </div>
      </div> --}}
      <!-- single sidebar -->
      <div class="aa-sidebar-widget">
        <h3>Các sản phẩm mới nhất</h3>
        <div class="aa-recently-views">
          <ul>
            @foreach ($listSanPhamMoiNhat as $sanpham)
              <li>
                <a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}" class="aa-cartbox-img">
                  <img src="/product_images/{{$sanpham->tenhinhanh}}" alt="img" style="max-width:80%;height: auto;">
                </a>
                <div class="aa-cartbox-info">
                  <h4><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                  <p>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</p>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
