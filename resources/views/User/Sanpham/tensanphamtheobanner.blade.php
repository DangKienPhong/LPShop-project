
@foreach ($listDanhMuc as $danhMuc)
@forelse ($listSanPham as $sanpham)
<div class="aa-catg-head-banner-content">

     @if ($danhMuc->TenDanhMuc == $sanpham->TenDanhMuc)
      <h2>{{$danhMuc->TenDanhMuc}}</h2>
 <ol class="breadcrumb">
   <li><a href="{{ url('') }}">Trang chủ</a></li>
   <li class="active">{{$danhMuc->TenDanhMuc}}</li>
 </ol>
</div>
@break
@endif
@empty

<li>Chưa có dữ liệu trong database</li>

@endforelse
@break
@endforeach


