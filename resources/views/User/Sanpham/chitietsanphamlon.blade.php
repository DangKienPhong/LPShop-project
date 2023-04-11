@extends("User.Layout.layout")
@section('content')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>{{$SanPhamDuocChon->TenSanPham}}</h2>
         <ol class="breadcrumb">
            <li><a href="{{ url('') }}">Trang chủ</a></li>
           <li><a href="{{ route('showListSanPhamUser') }}">Sản phẩm</a></li>
           <li class="active">{{$SanPhamDuocChon->TenSanPham}}</li>
         </ol>
       </div>
      </div>
    </div>
   </section>
   <!-- / catg header banner section -->

   <!-- product category -->
   <section id="aa-product-details">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="aa-product-details-area">
             <div class="aa-product-details-content">
               <div class="row">
                 <!-- Modal view slider -->
                 <div class="col-md-5 col-sm-5 col-xs-12">
                   <div class="aa-product-view-slider">
                     <div id="demo-1" class="simpleLens-gallery-container">






                       <div class="simpleLens-container">
                         <div class="simpleLens-big-image-container"><a data-lens-image="/product_images/{{$SanPhamDuocChon->tenhinhanh}}" class="simpleLens-lens-image"><img src="/product_images/{{$SanPhamDuocChon->tenhinhanh}}" class="simpleLens-big-image"></a></div>
                       </div>
                       {{-- <div class="simpleLens-thumbnails-container">
                           <a data-big-image="/product_images/{{$hinhanh->TenHinhAnh}}" data-lens-image="/product_images/{{$hinhanh->TenHinhAnh}}" class="simpleLens-thumbnail-wrapper" href="#">
                             <img src="front_assets/img/view-slider/thumbnail/polo-shirt-1.png">
                           </a>
                           <a data-big-image="/product_images/{{$hinhanh->TenHinhAnh}}" data-lens-image="/product_images/{{$hinhanh->TenHinhAnh}}" class="simpleLens-thumbnail-wrapper" href="#">
                             <img src="front_assets/img/view-slider/thumbnail/polo-shirt-3.png">
                           </a>
                           <a data-big-image="/product_images/{{$hinhanh->TenHinhAnh}}" data-lens-image="/product_images/{{$hinhanh->TenHinhAnh}}" class="simpleLens-thumbnail-wrapper" href="#">
                             <img src="front_assets/img/view-slider/thumbnail/polo-shirt-4.png">
                           </a>
                       </div> --}}
                     </div>


                   </div>
                 </div>
                 <!-- Modal view content -->
                 <div class="col-md-7 col-sm-7 col-xs-12">
                   <div class="aa-product-view-content">
                      @if (session('success'))
                        <div class="alert alert-success">
                          <h2>{{session('success')}}</h2>
                          <p>Bạn có thể xem các sản phẩm của website nhé.</p>
                        </div>

                      @endif
                      @if (session('fail'))
                        <div class="alert  alert-danger" >
                          <h2>{{session('fail')}}</h2>
                          <p>Bạn hãy kiểm tra lại thông tin nhé</p>
                        </div>
                      @endif
                     <h2  style="">{{$SanPhamDuocChon->TenSanPham}}</h2>
                     <div class="aa-price-block">
                        @if ($SanPhamDuocChon->TinhTrang == 1)
                        <p class="aa-product-avilability">Tình Trạng:
                          <button disabled="" class="aa-add-to-cart-btn" style="background-color: rgb(52, 216, 52); color: whitesmoke;" >Còn hàng</button></p>
                        @else
                        <p class="aa-product-avilability">Tình Trạng:
                          <button disabled="" class="aa-add-to-cart-btn" style="background-color: rgb(241, 58, 58); color: whitesmoke;" >Chờ nhập hàng</button></p>
                        </p>
                        @endif
                        @foreach ($listNhaCungCap as $nhaCungCap)
                        @if ($nhaCungCap->id == $SanPhamDuocChon->nha_cung_cap_id)
                        <p class="aa-product-avilability">Nhà cung cấp: <span style="color: #ff6f78; font-weight: bold;">{{$nhaCungCap->TenNhaCungCap}}</span></p>

                        @endif
                        @endforeach

                       <p class="aa-product-avilability">Ngày ra mắt: <span>{{$SanPhamDuocChon->NgayRaMat}}</span></p>
                       <p class="aa-product-view-price">Đơn giá:<h2  style="">{{number_format($SanPhamDuocChon->DonGia, 0, '', '.')}} VNĐ</h2>
                      </p>
                     </div>

                     {{-- <h4>Size</h4>
                     <div class="aa-prod-view-size">
                       <a href="#">S</a>
                       <a href="#">M</a>
                       <a href="#">L</a>
                       <a href="#">XL</a>
                     </div>
                     <h4>Color</h4>
                     <div class="aa-color-tag">
                       <a href="#" class="aa-color-green"></a>
                       <a href="#" class="aa-color-yellow"></a>
                       <a href="#" class="aa-color-pink"></a>
                       <a href="#" class="aa-color-black"></a>
                       <a href="#" class="aa-color-white"></a>
                     </div> --}}
                     <form action="{{route('addcart',['id'=>$SanPhamDuocChon->id])}}" method="POST">
                        @csrf
                      Số lượng đặt:
                     <div class="aa-prod-quantity">

                      <input type="number" value="1" min="1" class="form-control" name='soluong' style="width:100px">

                     </div>

                    </form>
                   </div>
                 </div>
               </div>
             </div>
             <div class="aa-product-details-bottom">
               <ul class="nav nav-tabs" id="myTab2">
                 <li><a href="#description" data-toggle="tab">Cấu hình chi tiết</a></li>
                 <li><a href="#review" data-toggle="tab">Reviews</a></li>
               </ul>

               <!-- Tab panes -->
               <div class="tab-content">
                 <div class="tab-pane fade in active" id="description">
                    <p class="aa-product-avilability">Cấu hình</p>
                   <ul>
                     <li>CPU: <span>{{$SanPhamDuocChon->CPU}}</span></li>
                     <li>GPU: <span>{{$SanPhamDuocChon->GPU}}</li>
                    <li>RAM: <span>{{$SanPhamDuocChon->RAM}}</li>
                    <li>Bộ Nhớ Trong: <span>{{$SanPhamDuocChon->BoNhoTrong}}</li>
                    <li>Chức năng hỗ trợ: <span>{{$SanPhamDuocChon->ChucNangHoTro}}</li>
                    <li>Bluetooth: <span>{{$SanPhamDuocChon->HoTroBluetooth}}</li>
                    <li>Cổng kết nối: <span>{{$SanPhamDuocChon->CongKetNoi}}</li>
                    <li>Cổng ra AV: <span>{{$SanPhamDuocChon->CongRaAV}}</li>
                    <li>Thiết bị bao gồm: <span>{{$SanPhamDuocChon->ThietBiBaoGom}}</li>
                   </ul>
                 </div>
                 <div class="tab-pane fade " id="review">
                  <div class="aa-product-review-area">
                    <h4>2 Reviews for T-Shirt</h4>
                    <ul class="aa-review-nav">
                      <li>
                         <div class="media">
                           <div class="media-left">
                             <a href="#">
                               <img class="media-object" src="front_assets/img/testimonial-img-3.jpg" alt="girl image">
                             </a>
                           </div>
                           <div class="media-body">
                             <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                             <div class="aa-product-rating">
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star-o"></span>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                           </div>
                         </div>
                       </li>
                       <li>
                         <div class="media">
                           <div class="media-left">
                             <a href="#">
                               <img class="media-object" src="front_assets/img/testimonial-img-3.jpg" alt="girl image">
                             </a>
                           </div>
                           <div class="media-body">
                             <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                             <div class="aa-product-rating">
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star"></span>
                               <span class="fa fa-star-o"></span>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                           </div>
                         </div>
                       </li>
                    </ul>
                    <h4>Add a review</h4>
                    <div class="aa-your-rating">
                      <p>Your Rating</p>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                    </div>
                    <!-- review form -->
                    <form action="" class="aa-review-form">
                       <div class="form-group">
                         <label for="message">Your Review</label>
                         <textarea class="form-control" rows="3" id="message"></textarea>
                       </div>
                       <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" class="form-control" id="name" placeholder="Name">
                       </div>
                       <div class="form-group">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                       </div>

                       <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                    </form>
                  </div>
                 </div>
               </div>
             </div>
             <!-- Related product -->

             <div class="aa-product-related-item">
               <h3>Sản phẩm cùng danh mục</h3>

               <ul class="aa-product-catg aa-related-item-slider">
                 <!-- start single product item -->
                 @forelse ($listSanPham as $sanpham)

                 @if($sanpham)

                <li>
                  <figure>


                   <a class="aa-product-img" href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">

                       <img src="/product_images/{{$sanpham->tenhinhanh}}" alt="polo shirt img" style="width: 250px; height:300px;">

                     </a>
                     @include('User.Sanpham.addcart')
                     <figcaption>
                      <h4 class="aa-product-title"><a href="{{ route('showDetailSanPhamUser', ['id_sanpham'=>$sanpham->id]) }}">{{$sanpham->TenSanPham}}</a></h4>
                      <span class="aa-product-price">{{$sanpham->DonGia}}</span><span class="aa-product-price"><del>{{$sanpham->DonGia}}</del></span>
                    </figcaption>
                  </figure>
                  {{-- <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div> --}}
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endif
                @empty

                 <li>Chưa có dữ liệu trong database</li>

               @endforelse
                  {{-- <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/women/girl-2.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                       <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                       <span class="aa-product-price">$45.50</span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                 </li>
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/man/t-shirt-1.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                   </figure>
                   <figcaption>
                     <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                     <span class="aa-product-price">$45.50</span>
                   </figcaption>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                 </li>
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/women/girl-3.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                       <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                       <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                 </li>
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                       <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                       <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                 </li>
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/women/girl-4.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                       <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                       <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                   <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                 </li>
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                       <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                       <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                   <span class="aa-badge aa-hot" href="#">HOT!</span>
                 </li>
                 <!-- start single product item -->
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img src="front_assets/img/women/girl-1.png" alt="polo shirt img"></a>
                     <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                       <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                       <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                   <span class="aa-badge aa-sale" href="#">SALE!</span>
                 </li> --}}
               </ul>
               <!-- quick view modal -->
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
               </div>
               <!-- / quick view modal -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- / product category -->



   @endsection
