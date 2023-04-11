@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Nhập sản phẩm mới</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Sản phẩm</a></li>
                            <li class="active">Thêm sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {{$errors}} --}}
<div class="content">
    <div class="animated fadeIn">
        @if (session('success'))
        <div class="alerts">
            <div class="row">
                <div class="col-md-12">

                    
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <h4 class="alert-heading">Đã thay đổi thông tin sản phẩm thành công ! <span class="badge badge-pill badge-success">Success</span></h4> 
                            <hr>
                            <p class="mb-0">{{session('success')}} <br> Hãy kiểm tra thông tin sản phẩm lại.</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    
                    </div>


                </div>


                
            </div>
        </div> <!-- .alerts -->
        @endif
        
        @if ($errors->any())
        <div class="alerts">
            <div class="row">
                <div class="col-md-12">

                    
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading">Không thể thêm sản phẩm ! <span class="badge badge-pill badge-danger">Failed</span></h4> 
                            <hr>
                            <p class="mb-0">Hãy kiểm tra lại thông tin bạn đã nhập.</p>
                            
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    
                    </div>


                </div>


                
            </div>
        </div> <!-- .alerts -->
        @endif

        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form thông tin sản phẩm</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('getSanPham', ['id'=>$SanPhamDuocChon->id]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            @method('PUT')
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tên Admin</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID sản phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="id" placeholder="Nhập tên sản phẩm" class="form-control" readonly="" value="{{$SanPhamDuocChon->id}}">
                                    <span style="color:red" class="help-block">
                                        @error('id')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenSanPham" placeholder="Nhập tên sản phẩm" class="form-control" readonly="" value="{{$SanPhamDuocChon->TenSanPham}}">
                                    <span style="color:red" class="help-block">
                                        @error('TenSanPham')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày ra mắt</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="text-input" name="NgayRaMat" placeholder="Nhập ngày ra mắt sản phẩm" class="form-control" readonly="" value="{{$SanPhamDuocChon->NgayRaMat}}">
                                    <span style="color:red" class="help-block">
                                        @error('NgayRaMat')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục sản phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="danh_muc_id" id="select" disabled="" class="form-control">
                                        <option value="0">Xin chọn danh mục</option>
                                        @foreach ($listDanhMuc as $danhMuc)
                                            @if ($danhMuc->id == $SanPhamDuocChon->danh_muc_id)
                                                <option selected value="{{$danhMuc->id}}">{{$danhMuc->TenDanhMuc}} - {{$danhMuc->TenDanhMucCon}} </option>
                                            @else
                                                <option value="{{$danhMuc->id}}">{{$danhMuc->TenDanhMuc}} - {{$danhMuc->TenDanhMucCon}} </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <span style="color:red" class="help-block">
                                        @error('danh_muc_con_id')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Nhà cung cấp</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="nha_cung_cap_id" id="select" disabled="" class="form-control">
                                        <option value="0">Xin chọn nhà cung cấp</option>
                                        @foreach ($listNhaCungCap as $nhaCungCap)
                                            @if ($nhaCungCap->id == $SanPhamDuocChon->nha_cung_cap_id)
                                                <option selected value="{{$nhaCungCap->id}}"> {{$nhaCungCap->TenNhaCungCap}} </option>
                                            @else
                                                <option value="{{$nhaCungCap->id}}"> {{$nhaCungCap->TenNhaCungCap}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="help-block">
                                        @error('nha_cung_cap_id')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số lượng</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="text-input" name="SoLuongTrongKho" placeholder="Nhập số lượng" readonly="" class="form-control" value="{{$SanPhamDuocChon->SoLuongTrongKho}}">
                                    <span style="color:red" class="help-block">
                                        @error('SoLuongTrongKho')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">CPU</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="CPU" placeholder="Nhập tên CPU" class="form-control" readonly="" value="{{$SanPhamDuocChon->CPU}}">
                                    <span style="color:red" class="help-block">
                                        @error('CPU')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">GPU</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="GPU" placeholder="Nhập tên GPU" class="form-control" readonly="" value="{{$SanPhamDuocChon->GPU}}">
                                    <span style="color:red" class="help-block">
                                        @error('GPU')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">RAM</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="RAM" placeholder="Nhập tên RAM" class="form-control" readonly="" value="{{$SanPhamDuocChon->RAM}}">
                                    <span style="color:red" class="help-block">
                                        @error('RAM')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bộ nhớ trong</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="BoNhoTrong" placeholder="Nhập tên bộ nhớ trong" class="form-control" readonly="" value="{{$SanPhamDuocChon->BoNhoTrong}}">
                                    <span style="color:red" class="help-block">
                                        @error('BoNhoTrong')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Chức năng hỗ trợ</label></div>
                                <div class="col-12 col-md-9"><textarea name="ChucNangHoTro" id="textarea-input" rows="9" placeholder="Nhập các chức năng" readonly="" class="form-control">{{$SanPhamDuocChon->ChucNangHoTro}}</textarea>
                                    <span style="color:red" class="help-block">
                                        @error('ChucNangHoTro')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Bao gồm</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="ThietBiBaoGom[]" value="Tay Cầm" class="form-check-input" disabled="" @if (in_array('Tay Cầm', $listThietBi)) checked @endif>Tay Cầm
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="checkbox2" name="ThietBiBaoGom[]" value="Tai Nghe" class="form-check-input" disabled="" @if (in_array('Tai Nghe', $listThietBi)) checked @endif> Tai nghe
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox3" name="ThietBiBaoGom[]" value="Doc sạc" class="form-check-input" disabled="" @if (in_array('Doc sạc', $listThietBi)) checked @endif> Doc sạc
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox4" class="form-check-label ">
                                                <input type="checkbox" id="checkbox4" name="ThietBiBaoGom[]" value="Không có thiết bị" class="form-check-input" disabled="" @if (in_array('Không có thiết bị', $listThietBi)) checked @endif> Không có thiết bị
                                            </label>
                                        </div>
                                        <span style="color:red" class="help-block">
                                            @error('ThietBiBaoGom')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Card Wifi</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Nhập tên card wifi" class="form-control"></div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Bluetooth</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="HoTroBluetooth" value="Có" disabled="" class="form-check-input" 
                                            @if ($SanPhamDuocChon->HoTroBluetooth == "Có" ) checked @endif>Hỗ trợ
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="HoTroBluetooth" value="Không" disabled="" class="form-check-input"
                                            @if ($SanPhamDuocChon->HoTroBluetooth == "Không") checked @endif>Không hỗ trợ
                                        </label>
                                        
                                    </div>
                                    <span style="color:red" class="help-block">
                                        @error('HoTroBluetooth')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tình trạng</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="TinhTrang" value="1" disabled="" class="form-check-input"
                                            @if ($SanPhamDuocChon->TinhTrang == 1) checked @endif>Sẵn sàng
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="TinhTrang" value="0" disabled="" class="form-check-input"
                                            @if ($SanPhamDuocChon->TinhTrang == 0) checked @endif>Chưa sẵn sàng
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cổng Kết nối</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="CongKetNoi" placeholder="Nhập tên cổng kết nối" readonly="" class="form-control" value="{{$SanPhamDuocChon->CongKetNoi}}">
                                    <span style="color:red" class="help-block">
                                        @error('CongKetNoi')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cổng Ra AV</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="CongRaAV" placeholder="Nhập tên cổng ra av" readonly="" class="form-control" value="{{$SanPhamDuocChon->CongRaAV}}">
                                    <span style="color:red" class="help-block">
                                        @error('CongRaAV')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn giá</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="DonGia" placeholder="Nhập đơn giá của sản phẩm" readonly="" class="form-control" value="{{$SanPhamDuocChon->DonGia}}">
                                    <span style="color:red" class="help-block">
                                        @error('DonGia')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Được sửa chửa lần cuối bởi</label></div>
                                <div class="col-12 col-md-9">
                                    @foreach ($listAdmin as $listAdmin)
                                    @if ($SanPhamDuocChon->admin_id == $listAdmin->id)
                                        <input type="text" id="text-input" name="AdminId" placeholder="Nhập đơn giá của sản phẩm" readonly="" class="form-control" value="{{$listAdmin->name}}">
                                        @break
                                    @endif
                                    @if ($SanPhamDuocChon->admin_id == 0)
                                        <input type="text" id="text-input" name="AdminId" placeholder="Nhập đơn giá của sản phẩm" readonly="" class="form-control" value="Cơ sở dữ liệu có sẵn">
                                        @break
                                    @endif
                                    @endforeach
                                    
                                    <span style="color:red" class="help-block">
                                        @error('AdminId')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Video review sản phẩm</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file"></div>
                            </div> --}}
                        
                            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Chỉnh sửa</button>
                            <button style="float: right;" type="button" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-mail-reply"></i>&nbsp; Trở về</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
                {{-- @if (session('success'))
                <div class="alert alert-dismissible alert-sucess">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <h4 class="alert-heading">Thành công !</h4>
                    <p class="mb-0">Sản phẩm đã được thêm vào database thành công !</p>
                </div>
                @endif --}}
                
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Hình ảnh sản phẩm</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Tên hình ảnh</th>
                                    <th>Hình ảnh</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                {{-- @foreach ($cacHinhAnh as $hinhAnh)
                                <tr>
                                    <td>{{ $hinhAnh->id }}</td>
                                    <td>{{ $hinhAnh->TenHinhAnh }}</td>
                                    <td><img  src="/product_images/{{$hinhAnh->TenHinhAnh}}" class="img-fluid" alt=""> <br></td>
                                    
                                    
                                    
                                </tr>
                                @endforeach --}}

                                
                                <tr>
                                    {{-- <td>{{ $hinhAnh->id }}</td> --}}
                                    <td>{{ $SanPhamDuocChon->tenhinhanh }}</td>
                                    <td><img  src="/product_images/{{$SanPhamDuocChon->tenhinhanh}}" class="img-fluid" alt="" style="width: 200px;height:200px "> <br></td>
   
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

               
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection
@section('scripts')
    <!-- Scripts -->

    <script src="{{ asset('back_assets/assets/js/lib/data-table/datatables.min.js') }} "></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/dataTables.bootstrap.min.js') }} "></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('back_assets/assets/js/init/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
@endsection
