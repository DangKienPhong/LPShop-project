@extends("User.Layout.layout")
@section('content')
 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>Chi tiết đơn hàng</h2>
         <ol class="breadcrumb">
            <li><a href="{{ url('') }}">Trang chủ</a></li>
           <li class="active">Chi tiết đơn hàng</li>
         </ol>
       </div>
      </div>
    </div>
   </section>
   <!-- / catg header banner section -->

  <!-- Cart view section -->
  <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table aa-wishlist-table">
              <form action="">
                <div class="table-responsive">
                    <div class="cart-view-total">
                        <h4>Thông tin chi tiết đơn hàng</h4>
                    </div>

                        <table class="table">
                          <tbody>
                              <tr>
                                <th>ID đơn hàng</th>
                                <td><a class="aa-cart-title" href="#">{{$DonHangDuocChon->id}}</a></td>
                              </tr>
                              <tr>
                                <th>Tên người nhận</th>
                                <td><a class="aa-cart-title" href="#">{{$DonHangDuocChon->TenNguoiNhan}}</a></td>
                              </tr>
                              <tr>
                                <th>Địa chỉ</th>
                                <td>{{$DonHangDuocChon->DiaChi}}</td>
                              </tr>
                              <tr>
                                <th>Số điện thoại liên lạc</th>
                                <td>{{$DonHangDuocChon->SoDienThoai}}</td>
                              </tr>
                              <tr>
                                <th>Email</th>
                                <td>{{$DonHangDuocChon->Email}}</td>
                              </tr>
                              <tr>
                                <th>Ngày đặt đơn hàng</th>
                                <td>{{$DonHangDuocChon->created_at}}</td>
                              </tr>
                              <tr>
                                <th>Tổng tiền hóa đơn</th>
                                <td><a class="aa-cart-title" href="#">{{number_format($DonHangDuocChon->ThanhTien, 0, '', '.')}} VNĐ</a></td>
                              </tr>
                              <tr>
                                <th>Ghi chú cho hóa đơn:</th>
                                <td>{{$DonHangDuocChon->GhiChu}}</td>
                              </tr>
                              <tr>
                                <th>Phương thức thanh toán</th>
                                <td><a class="aa-cart-title" href="#">{{$DonHangDuocChon->PhuongThucThanhToan}}</a></td>
                              </tr>
                              @if ($DonHangDuocChon->MaGiaoDich != NULL)
                              <tr>
                                <th>Mã Giao Dịch</th>
                                <td><a class="aa-cart-title" href="#">{{$DonHangDuocChon->MaGiaoDich}}</a></td>
                              </tr> 
                              @endif
                              <tr>
                                <th>Tình trạng</th>
                                <td>
                                    @if ($DonHangDuocChon->TinhTrang == 'Đang Vận Chuyển')
                                        <button disabled="" style="background-color: rgb(52, 216, 52); color: whitesmoke;font-family: bold;font-size: 20px;" >{{$DonHangDuocChon->TinhTrang}}</button></p>
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Nhận đơn hàng')
                                        <button disabled="" style="background-color: rgb(52, 183, 216); color: whitesmoke;font-family: bold;font-size: 20px;" >{{$DonHangDuocChon->TinhTrang}}</button></p>
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Chờ Phê Duyệt')
                                        <button disabled="" style="background-color: #ff6f78; color: whitesmoke;font-family: bold;font-size: 20px;" >{{$DonHangDuocChon->TinhTrang}}</button></p>
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Nhận Thành Công')
                                        <button disabled="" style="background-color: rgb(24, 175, 24); color: whitesmoke;font-family: bold;font-size: 20px;" >{{$DonHangDuocChon->TinhTrang}}</button></p>
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Hủy Đơn Hàng')
                                        <button disabled="" style="background-color: #ff6f78; color: whitesmoke;font-family: bold;font-size: 20px;" >{{$DonHangDuocChon->TinhTrang}}</button></p>
                                    @endif
                                </td>
                              </tr>
                              <tr>
                                <th>Lịch sử trạng thái:</th>
                                <td>{{$DonHangDuocChon->LichSuDonHang}}</td>
                              </tr>
                          </tbody>
                        </table>
                        
                    <div class="cart-view-total">
                        <h4>Danh sách sản phẩm</h4>
                    </div>
                   <table class="table">
                     <thead>
                       <tr>
                         <th>ID sản phẩm</th>
                         <th>Hình ảnh sản phẩm</th>
                         <th>Tên sản phẩm</th>
                         <th>Đơn giá</th>
                         <th>Số lượng</th>
                         <th>Tổng tiền</th>
                       </tr>
                     </thead>
                     <tbody>
                      @forelse ($ChiTietDonHangDuocChon as $SanPham )
                      <tr>
                        <td><a class="aa-cart-title" href="#">{{$SanPham->san_pham_id}}</a></td>
                        <td>
                            @foreach ($ListSanPham as $image)
                                @if ( $image->id == $SanPham->san_pham_id)
                                    <img src="/product_images/{{$image->tenhinhanh}}" alt="img">
                                @endif
                            @endforeach
                        </td>
                        <td><a class="aa-cart-title" href="#">{{$SanPham->TenSanPham}}</a></td>
                        <td>{{number_format($SanPham->DonGia, 0, '', '.')}} VNĐ</td>
                        <td>{{$SanPham->SoLuong}} </td>
                        <td>{{number_format($SanPham->DonGia*$SanPham->SoLuong, 0, '', '.')}} VNĐ</td>
                      </tr>
                      @empty
                      <tr>
                        <td></td>
                        <td>Không có sản phẩm trong đơn hàng</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endforelse
                                         
                       </tbody>
                   </table>
                 </div>
              </form>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->


   @endsection
