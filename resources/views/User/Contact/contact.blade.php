@extends("User.Layout.layout")
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>Liên hệ</h2>
         <ol class="breadcrumb">
           <li><a href="{{ url('') }}">Trang chủ</a></li>
           <li class="active">Liên hệ</li>
         </ol>
       </div>
      </div>
    </div>
   </section>
   <!-- / catg header banner section -->
 <!-- start contact section -->
  <section id="aa-contact">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="aa-contact-area">

              @if (session('success'))
                <div class="aa-contact-top" style="background-color: rgb(49, 233, 49);">
                  <h2 style="color: white;">{{session('success')}}</h2>
                  <p style="color: white;">Bạn có thể xem các trang khác của website nhé.</p>
                </div>
              @else
                <div class="aa-contact-top" style="background-color: #f87272;">
                  <h2 style="color: white;">Chúng tôi sẽ luôn hỗ trợ bạn</h2>
                  <p style="color: white;" >Địa chỉ nơi làm việc</p>
                </div>
              @endif
              @if (session('fail'))
                <div class="aa-contact-top" >
                  <h2 style="color: red;">{{session('fail')}}</h2>
                  <p>Bạn hãy kiểm tra lại thông tin nhé</p>
                </div>
              @endif
              @if ($errors->any())
                <div class="aa-contact-top" >
                  <h2 style="color:red;">Thông tin bạn điền không chính xác !</h2>
                  <p>Bạn hãy kiểm tra lại thông tin nhé</p>
                </div>
              @endif
            <!-- contact map -->
            <div class="aa-contact-map">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!-- Contact address -->
            <div class="aa-contact-address">
              <div class="row">
                <div class="col-md-8">
                  <div class="aa-contact-address-left">
                    <form class="comments-form contact-form" action="{{route('luuLienHe')}}" method="post">
                      {{ csrf_field() }}
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <input type="text" placeholder="Họ Tên" name="TenNguoiGui" class="form-control">
                           <span style="color:red" class="help-block">
                            @error('TenNguoiGui')
                                {{$message}}
                            @enderror
                        </span>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                           <input type="email" placeholder="Email" name="Email" class="form-control">
                           <span style="color:red" class="help-block">
                            @error('Email')
                                {{$message}}
                            @enderror
                        </span>
                         </div>
                       </div>
                     </div>
                      <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <input type="text" placeholder="Tiêu đề liên hệ" name="TieuDe" class="form-control">
                           <span style="color:red" class="help-block">
                            @error('TieuDe')
                                {{$message}}
                            @enderror
                        </span>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                           <input type="text" placeholder="Công ty bạn đại diện" name="TenCongTy" class="form-control">
                           <span style="color:red" class="help-block">
                            @error('TenCongTy')
                                {{$message}}
                            @enderror
                        </span>
                         </div>
                       </div>
                     </div>

                     <div class="form-group">
                       <textarea class="form-control" rows="3" placeholder="Nội dung liên hệ" name="NoiDung"></textarea>
                       <span style="color:red" class="help-block">
                        @error('NoiDung')
                            {{$message}}
                        @enderror
                       </span>
                     </div>
                     <button  type="submit" class="aa-secondary-btn">Gửi</button>
                   </form>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="aa-contact-address-right">
                    <address>
                      <h4>LPShop</h4>
                      <p>Các thông tin liên hệ:</p>
                      <p><span class="fa fa-home"></span> Địa chỉ: 180 Cao Lỗ, Phường 4, Quận 8, TP. Hồ Chí Minh.</p>
                      <p><span class="fa fa-phone"></span>0924241299</p>
                      <p><span class="fa fa-envelope"></span>Email 1: dangkienphong555@gmail.com</p>
                      <p><span class="fa fa-envelope"></span>Email 2: phamtienlong135@gmail.com</p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
