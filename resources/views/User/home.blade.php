@extends("User.Layout.layout")
@section('content')
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('front_assets/img/slider/1213.PNG') }}" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>Save Up to 75% Off</span>
                <h2 data-seq>Spring Sale</h2>
                <p data-seq>Hãy mua ngay !</p>
                <a data-seq href="{{ route('showListSanPhamUser') }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('front_assets/img/slider/12334.PNG') }}" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40% Off</span>
                <h2 data-seq>Playsation Store</h2>
                <p data-seq>Đây là đường link của dẫn đến danh sách sản phẩm</p>
                <a data-seq href="{{ route('showListSanPhamUser') }}" class="aa-shop-now-btn aa-secondary-btn">Mua ngay</a>
              </div>
            </li>
            <!-- single slide item -->
            {{-- <li>
              <div class="seq-model">
                <img data-seq src="front_assets/img/slider/3.jpg" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>
                <h2 data-seq>Jeans Collection</h2>
                <p data-seq>Đây là đường link của dẫn đến danh sách sản phẩm</p>
                <a data-seq href="{{ route('showListSanPhamUser') }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="front_assets/img/slider/4.jpg" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>
                <h2 data-seq>Exclusive Shoes</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
             <li>
              <div class="seq-model">
                <img data-seq src="front_assets/img/slider/5.jpg" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 50% Off</span>
                <h2 data-seq>Best Collection</h2>
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="{{ url('sanpham') }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li> --}}
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">

            <div class="row">
              <!-- promo left -->

              <div class="col-md-5 no-padding">

                <div class="aa-promo-left">
                    @forelse ($listDanhMuc as $DanhMuc)
                  <div class="aa-promo-banner">
                    <img src="{{ asset('front_assets/img/Máy ps4.png') }}" alt="img">
                    <div class="aa-prom-content">
                      <span>75% Off</span>
                      @if ( $DanhMuc->TenDanhMuc=='Máy chơi game')

                      <h2><a href="{{ route('showListSanPhamTheoDanhMucLon', ['id'=>$DanhMuc->TenDanhMuc]) }}">{{ $DanhMuc->TenDanhMuc }}</a></h2>
                      @endif
                    </div>
                  </div>
                  @empty

                  <li>Chưa có dữ liệu trong database</li>

              @endforelse
                </div>

              </div>

              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">

                    <div class="aa-promo-banner">

                      <img src="{{ asset('front_assets/img/Game.png') }}" alt="img">
                      @forelse ($listDanhMuc as $DanhMuc1)
                      <div class="aa-prom-content">
                        <span>Exclusive Item</span>
                        @if ( $DanhMuc1->TenDanhMuc=='Game')

                        <h2><a href="{{ route('showListSanPhamTheoDanhMucLon', ['id'=>$DanhMuc1->TenDanhMuc]) }}">{{ $DanhMuc1->TenDanhMuc }}</a></h2>
                        @endif

                      </div>
                      @empty

                      <li>Chưa có dữ liệu trong database</li>

                  @endforelse
                    </div>

                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">
                      <img src="{{ asset('front_assets/img/phukien.png') }}" alt="img">
                      @forelse ($listDanhMuc as $DanhMuc2)
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        @if ( $DanhMuc2->TenDanhMuc=='Phụ kiện')
                        <h2><a href="{{ route('showListSanPhamTheoDanhMucLon', ['id'=>$DanhMuc2->TenDanhMuc]) }}">{{ $DanhMuc2->TenDanhMuc }}</a></h2>
                        @endif

                      </div>
                      @empty

                      <li>Chưa có dữ liệu trong database</li>

                  @endforelse
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">
                      <img src="{{ asset('front_assets/img/thegame.png') }}" alt="img">
                      @forelse ($listDanhMuc as $DanhMuc3)
                      <div class="aa-prom-content">
                        <span>New Arrivals</span>
                        @if ( $DanhMuc3->TenDanhMuc=='Thẻ game')
                        <h2><a href="{{ route('showListSanPhamTheoDanhMucLon', ['id'=>$DanhMuc3->TenDanhMuc]) }}">{{ $DanhMuc3->TenDanhMuc }}</a></h2>
                        @endif


                    </div>
                    @empty

                    <li>Chưa có dữ liệu trong database</li>

                @endforelse
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">
                      <img src="{{ asset('front_assets/img/Cu.png') }}" alt="img">
                      @forelse ($listDanhMuc as $DanhMuc4)
                      <div class="aa-prom-content">
                        <span>New Arrivals</span>
                        @if ( $DanhMuc4->TenDanhMuc=='Máy cũ')
                        <h2><a href="{{ route('showListSanPhamTheoDanhMucLon', ['id'=>$DanhMuc4->TenDanhMuc]) }}">{{ $DanhMuc4->TenDanhMuc }}</a></h2>
                        @endif


                    </div>
                    @empty

                    <li>Chưa có dữ liệu trong database</li>

                @endforelse
                  </div>
                </div>
              </div>

            </div>


          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">

                    <li class="active"><a href="#men" data-toggle="tab">Máy chơi game</a></li>
                    <li><a href="#women" data-toggle="tab">Game</a></li>
                    <li><a href="#electronics" data-toggle="tab">Thẻ Game</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @forelse ($listSanPhamMayChoiGame as $sanpham )
                        @if($sanpham->TinhTrang==0)
                        <!-- start single product item -->
                        <li>

                          <figure>
                            <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">
                                <img src="/product_images/{{$sanpham->tenhinhanh}}" alt="polo shirt img" style="width: 250px; height:300px;"></a>



                            <figcaption>
                                <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                              <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                              {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                            </figcaption>
                          </figure>
                          {{-- <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                          </div> --}}
                          <!-- product badge -->
                          {{-- <span class="aa-badge aa-sale" href="#">SALE!</span> --}}
                          <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li>
                        @else
                        <li>

                            <figure>
                              <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">




                                  <img src="/product_images/{{$sanpham->tenhinhanh}}"style="width: 250px; height:300px;"></a>
                                  @include('User.Sanpham.addcart')
                              <figcaption>
                                  <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                                <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                                {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                              </figcaption>
                            </figure>
                            {{-- <div class="aa-product-hvr-content">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                              <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                              <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                            </div> --}}
                            <!-- product badge -->

                          </li>
                          @endif
                        @empty
                        <td>Chưa có sản phẩm trong database</td>
                        @endforelse

                            <!-- start single product item -->
                              </ul>
                              <a class="aa-browse-btn" href="{{ route('showListSanPhamUser') }}">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                            </div>
                            <!-- / men product category -->
                            <!-- start women product category -->
                            <div class="tab-pane fade" id="women">
                              <ul class="aa-product-catg">

                                <!-- start single product item -->
                                @forelse ($listSanPhamGame  as $sanpham )
                                @if($sanpham->TinhTrang==0)
                                <!-- start single product item -->
                                <li>

                                  <figure>
                                    <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">




                                        <img src="/product_images/{{$sanpham->tenhinhanh}}"style="width: 250px; height:300px;"></a>

                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                                      <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                                      {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                                    </figcaption>
                                  </figure>
                                  {{-- <div class="aa-product-hvr-content">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                  </div> --}}
                                  <!-- product badge -->
                                  <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                </li>
                                @else
                                <li>

                                    <figure>
                                      <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">




                                          <img src="/product_images/{{$sanpham->tenhinhanh}}"style="width: 250px; height:300px;"></a>

                                          @include('User.Sanpham.addcart')
                                      <figcaption>
                                          <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                                        <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                                        {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                                      </figcaption>
                                    </figure>
                                    {{-- <div class="aa-product-hvr-content">
                                      <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                      <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                      <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                    </div> --}}
                                    <!-- product badge -->

                                  </li>
                                  @endif
                                @empty
                                <td>Chưa có sản phẩm trong database</td>
                         @endforelse


                      </ul>
                      <a class="aa-browse-btn" href="{{ route('showListSanPhamUser') }}">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / women product category -->

                    <!-- start electronic product category -->
                    <div class="tab-pane fade" id="electronics">
                       <ul class="aa-product-catg">
                        <!-- start single product item -->
                         <!-- start single product item -->
                         @forelse ($listSanPhamTheGame  as $sanpham )
                         @if($sanpham->TinhTrang==0)
                         <!-- start single product item -->
                         <li>

                           <figure>
                             <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">




                                 <img src="/product_images/{{$sanpham->tenhinhanh}}" alt="polo shirt img" style="width: 250px; height:300px;"></a>


                             <figcaption>
                                 <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                               <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                               {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                             </figcaption>
                           </figure>
                           {{-- <div class="aa-product-hvr-content">
                             <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                             <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                             <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                           </div> --}}
                           <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                         </li>
                         @else
                         <li>

                             <figure>
                               <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">




                                   <img src="/product_images/{{$sanpham->tenhinhanh}}"style="width: 250px; height:300px;"></a>
                                   @include('User.Sanpham.addcart')
                               <figcaption>
                                   <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                                 <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                                 {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                               </figcaption>
                             </figure>
                             {{-- <div class="aa-product-hvr-content">
                               <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                               <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                               <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                             </div> --}}
                             <!-- product badge -->

                           </li>
                           @endif
                         @empty
                         <td>Chưa có sản phẩm trong database</td>
                  @endforelse

                      </ul>
                      <a class="aa-browse-btn" href="{{ route('showListSanPhamUser') }}">Xem tất cả sản phấm <span class="fa fa-long-arrow-right"></span></a>
                    </div>

                  {{-- <!-- quick view modal -->
                  <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-slider">
                                <div class="simpleLens-gallery-container" id="demo-1">
                                  <div class="simpleLens-container">
                                      <div class="simpleLens-big-image-container">
                                          <a class="simpleLens-lens-image" data-lens-image="front_assets/img/view-slider/large/polo-shirt-1.png">
                                              <img src="front_assets/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="front_assets/img/view-slider/large/polo-shirt-1.png"
                                         data-big-image="front_assets/img/view-slider/medium/polo-shirt-1.png">
                                          <img src="front_assets/img/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="front_assets/img/view-slider/large/polo-shirt-3.png"
                                         data-big-image="front_assets/img/view-slider/medium/polo-shirt-3.png">
                                          <img src="front_assets/img/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="front_assets/img/view-slider/large/polo-shirt-4.png"
                                         data-big-image="front_assets/img/view-slider/medium/polo-shirt-4.png">
                                          <img src="front_assets/img/view-slider/thumbnail/polo-shirt-4.png">
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>T-Shirt</h3>
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price">$34.99</span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                  <a href="#">S</a>
                                  <a href="#">M</a>
                                  <a href="#">L</a>
                                  <a href="#">XL</a>
                                </div>
                                <div class="aa-prod-quantity">
                                  <form action="">
                                    <select name="" id="">
                                      <option value="0" selected="1">1</option>
                                      <option value="1">2</option>
                                      <option value="2">3</option>
                                      <option value="3">4</option>
                                      <option value="4">5</option>
                                      <option value="5">6</option>
                                    </select>
                                  </form>
                                  <p class="aa-prod-category">
                                    Category: <a href="#">Polo T-Shirt</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal --> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{ asset('front_assets/img/banner/2.PNG') }}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Sản phẩm mới</a></li>
                {{-- <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li> --}}
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    @forelse ($listSanPham as $sanpham )
                    @if($sanpham->TinhTrang==0)
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">
                        <img src="/product_images/{{$sanpham->tenhinhanh}}" alt="polo shirt img" style="width: 250px; height:300px;"></a>


                     <figcaption>
                        <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                       <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                       {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}
                     </figcaption>
                   </figure>
                   {{-- <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}" data-toggle2="tooltip" data-placement="top" title="Quick View"><span class="fa fa-search"></span></a>
                   </div> --}}
                   <!-- product badge -->
                   <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                 </li>
                 @else
                 <li>

                     <figure>
                       <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">




                           <img src="/product_images/{{$sanpham->tenhinhanh}}"style="width: 250px; height:300px;"></a>

                           @include('User.Sanpham.addcart')
                       <figcaption>
                           <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                         <span class="aa-product-price">{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</span>
                         {{-- <span class="aa-product-price"><del>{{number_format($sanpham->DonGia, 0, '', '.')}} VNĐ</del></span> --}}

                       </figcaption>
                     </figure>
                     {{-- <div class="aa-product-hvr-content">
                       <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                       <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                       <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                     </div> --}}
                     <!-- product badge -->

                   </li>
                   @endif


                 @empty
                 <td>Chưa có sản phẩm trong database</td>
                 @endforelse

                    <!-- start single product item -->

                  </ul>
                  <a class="aa-browse-btn" href="{{ route('showListSanPhamUser') }}">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>MIỄN PHÍ VẬN CHUYỂN</h4>
                <P>VỚI ĐƠN HÀNG TRÊN 1 TRIỆU</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>2 NGÀY HOÀN TRẢ</h4>
                <P>NẾU BẠN KHÔNG ƯNG VỚI SẢN PHẨM BẠN CÓ THỂ HOÀN LẠI TIỀN</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>HỖ TRỢ 24/7</h4>
                <P>CHÚNG TÔI LUÔN SẴN SÀNG HỖ TRỢ BẠN</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  {{-- <section id="aa-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="front_assets/img/testimonial-img-2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="front_assets/img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="front_assets/img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- / Testimonial -->

  {{-- <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#"><img src="front_assets/img/promo-banner-1.jpg" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#"><img src="front_assets/img/promo-banner-3.jpg" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                     <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#"><img src="front_assets/img/promo-banner-1.jpg" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest Blog --> --}}

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/5.png') }}"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/6.png') }}" alt="jquery img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/7.png') }}" alt="html5 img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/8.png') }}" alt="css3 img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/9.png') }}" alt="wordPress img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/5.png') }}" alt="joomla img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/6.png') }}" alt="java img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/7.png') }}" alt="jquery img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/8.png') }}" alt="html5 img"></a></li>
              <li><a href="#"><img src="{{ asset('front_assets/img/banner/9.png') }}" alt="css3 img"></a></li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->


  @endsection

