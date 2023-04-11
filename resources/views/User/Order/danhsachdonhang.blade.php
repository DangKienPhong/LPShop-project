@extends("User.Layout.layout")
@section('content')
 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
    @include('User.Sanpham.bannershop')
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>Danh sách đơn hàng được đặt</h2>
         <ol class="breadcrumb">
            <li><a href="{{ url('') }}">Trang chủ</a></li>
           <li class="active">Danh sách đơn hàng</li>
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
                    <h4>Các đơn hàng đang xử lý</h4>
                </div>
                   <table class="table">
                     <thead>
                       <tr>
                         <th>ID đơn hàng</th>
                         <th>Ngày đặt đơn hàng</th>
                         <th>Tình trạng đơn hàng</th>
                         <th>Số lượng sản phẩm</th>
                         <th>Phương thức thanh toán</th>
                         <th>Tổng tiền</th>
                         <th></th>
                       </tr>
                     </thead>
                     <tbody>
                      @forelse ($listDonHang as $DonHang )
                      <tr>
                        <td><a class="aa-cart-title" href="#">{{$DonHang->id}}</a></td>
                        <td>{{$DonHang->created_at}}</td>
                        <td>
                          @if ($DonHang->TinhTrang == 'Đang Vận Chuyển')
                            <button disabled="" style="background-color: rgb(52, 216, 52); color: whitesmoke;font-family: bold;font-size: 18px;" >{{$DonHang->TinhTrang}}</button></p>
                          @elseif ($DonHang->TinhTrang == 'Chờ Phê Duyệt')
                          <button disabled="" style="background-color: #ff6f78; color: whitesmoke;font-family: bold;font-size: 18px;" >{{$DonHang->TinhTrang}}</button></p>
                          @else
                          <button disabled="" style="background-color: rgb(52, 183, 216); color: whitesmoke;font-family: bold;font-size: 18px;" >{{$DonHang->TinhTrang}}</button></p>
                          @endif
                        </td>
                        <td>{{$DonHang->chitiet->count()}}</td>
                        {{-- <td>test</td> --}}
                        <td><input class="aa-cart-view-btn" value="{{$DonHang->PhuongThucThanhToan}}"> </td>
                        <td><a class="aa-cart-title" href="#">{{number_format($DonHang->ThanhTien, 0, '', '.')}} VNĐ</a></td>
                        <td><a href="{{ route('showDetailDonHangUser', ['id'=>$DonHang->id]) }}" class="aa-add-to-cart-btn">Xem chi tiết</a></td>
                      </tr>
                      @empty
                      <tr>
                        <td></td>
                        <td>Chưa có đơn hàng nào được đặt</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endforelse
                       <tr>
                        <td colspan="7" class="aa-cart-view-bottom">
                          
                          {{-- <input class="aa-cart-view-btn" type="submit" value="Update Cart"> --}}
                          {{$listDonHang->onEachSide(1)->links()}}
                        </td>
                      </tr>                  
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
