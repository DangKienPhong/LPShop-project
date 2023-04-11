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

<div class="content">
    <div class="animated fadeIn">
        
        @if (session('success'))
        <div class="alerts">
            <div class="row">
                <div class="col-md-12">

                    
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <h4 class="alert-heading">Đã thêm sản phẩm thành công ! <span class="badge badge-pill badge-success">Success</span></h4> 
                            <hr>
                            <p class="mb-0">Sản phẩm mới sẽ được hiển thị khi bạn xem danh sách sản phẩm. <br> Bạn có thể tiếp tục thêm sản phẩm khác ở Form thông tin dưới.</p>
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
                            {{-- @foreach ( $errors as $errors)
                                <p class="mb-0">Lỗi: $errors - {{$message}} </p>
                                <hr>
                                <br>
                            @endforeach --}}
                            
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    
                    </div>


                </div>


                
            </div>
        </div> <!-- .alerts -->
        @endif
        @if (session('error'))
        <div class="alerts">
            <div class="row">
                <div class="col-md-12">

                    
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading">Không thể thêm sản phẩm ! <span class="badge badge-pill badge-danger">Failed</span></h4> 
                            <hr>
                            <p class="mb-0">Hãy kiểm tra lại thông tin bạn đã nhập. {{session('error')}}</p>
                            
                            
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
                        <form action="{{ route('luuSanPham') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tên Admin</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenSanPham" placeholder="Nhập tên sản phẩm" class="form-control" value="{{ old('TenSanPham') }}">
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
                                    <input type="date" id="text-input" name="NgayRaMat" placeholder="Nhập ngày ra mắt sản phẩm" class="form-control" value="{{ old('NgayRaMat') }}">
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
                                    <select name="danh_muc_id" id="select" class="form-control">
                                        <option value="">Xin chọn danh mục</option>
                                        @foreach ($listDanhMuc as $danhMuc)
                                            <option value="{{$danhMuc->id}}">{{$danhMuc->TenDanhMuc}} - {{$danhMuc->TenDanhMucCon}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="help-block">
                                        @error('danh_muc_id')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Nhà cung cấp</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="nha_cung_cap_id" id="select" class="form-control">
                                        <option value="0">Xin chọn nhà cung cấp</option>
                                        @foreach ($listNhaCungCap as $nhaCungCap)
                                            <option value="{{$nhaCungCap->id}}">{{$nhaCungCap->TenNhaCungCap}}</option>
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
                                <div class="col-12 col-md-9"><input type="number" id="text-input" name="SoLuongTrongKho" placeholder="Nhập số lượng" class="form-control" value="{{ old('SoLuongTrongKho') }}">
                                    <span style="color:red" class="help-block">
                                        @error('SoLuongTrongKho')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">CPU</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="CPU" placeholder="Nhập tên CPU" class="form-control" value="{{ old('CPU') }}">
                                    <span style="color:red" class="help-block">
                                        @error('CPU')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">GPU</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="GPU" placeholder="Nhập tên GPU" class="form-control" value="{{ old('GPU') }}">
                                    <span style="color:red" class="help-block">
                                        @error('GPU')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">RAM</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="RAM" placeholder="Đơn vị GB" class="form-control" value="{{ old('RAM') }}">
                                    <span style="color:red" class="help-block">
                                        @error('RAM')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bộ nhớ trong</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="BoNhoTrong" placeholder="Nhập tên bộ nhớ trong" class="form-control" value="{{ old('BoNhoTrong') }}">
                                    <span style="color:red" class="help-block">
                                        @error('BoNhoTrong')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Chức năng hỗ trợ</label></div>
                                <div class="col-12 col-md-9"><textarea name="ChucNangHoTro" id="textarea-input" rows="9" placeholder="Nhập các chức năng" class="form-control">{{ old('ChucNangHoTro') }}</textarea>
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
                                                <input type="checkbox" id="checkbox1" name="ThietBiBaoGom[]" value="Tay Cầm" class="form-check-input">Tay Cầm
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="checkbox2" name="ThietBiBaoGom[]" value="Tai Nghe" class="form-check-input"> Tai nghe
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox3" name="ThietBiBaoGom[]" value="Doc sạc" class="form-check-input"> Doc sạc
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox4" class="form-check-label ">
                                                <input type="checkbox" id="checkbox4" name="ThietBiBaoGom[]" value="Không có thiết bị" class="form-check-input"> Không có thiết bị
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
                                            <input type="radio" id="inline-radio1" name="HoTroBluetooth" value="Có" class="form-check-input">Hỗ trợ
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="HoTroBluetooth" value="Không" checked="" class="form-check-input">Không hỗ trợ
                                        </label>
                                        
                                    
                                        <span style="color:red" class="help-block">
                                            @error('HoTroBluetooth')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tình trạng</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="TinhTrang" value="1" class="form-check-input">Sẵn sàng
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="TinhTrang" checked="" value="0" class="form-check-input">Chưa sẵn sàng
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cổng Kết nối</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="CongKetNoi" placeholder="Nhập tên cổng kết nối" class="form-control" value="{{ old('CongKetNoi') }}">
                                <span style="color:red" class="help-block">
                                    @error('CongKetNoi')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cổng Ra AV</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="CongRaAV" placeholder="Nhập tên cổng ra av" class="form-control" value="{{ old('CongRaAV') }}">
                                <span style="color:red" class="help-block">
                                    @error('CongRaAV')
                                        {{$message}}
                                    @enderror
                                </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn giá</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="DonGia" placeholder="Nhập đơn giá của sản phẩm" class="form-control" value="{{ old('DonGia') }}">
                                <span style="color:red" class="help-block">
                                    @error('DonGia')
                                        {{$message}}
                                    @enderror
                                </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Hình ảnh sản phẩm</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="tenhinhanh" accept="image/*" class="form-control-file">
                                    <span style="color:red" class="help-block">
                                        @error('tenhinhanh')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                
                            </div>
                           
                        
                            <button style="float: right;" type="submit" class="btn btn-primary" ><i class="fa fa-check-circle"></i>&nbsp; Lưu</button>
                            <button style="float: right;" type="button" class="btn btn-warning" onClick="window.location.reload();"><i class="fa fa-retweet"></i>&nbsp; Reset</button>
                            <button style="float: right;" type="button" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-mail-reply"></i>&nbsp; Trở về</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
                
                
                
            </div>

               
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection

