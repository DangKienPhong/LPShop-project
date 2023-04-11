@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Thêm Nhà Cung Cấp</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Nhà Cung Cấp</a></li>
                            <li class="active">Thêm Nhà Cung Cấp</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">


        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Nhập thông tin nhà cung cấp</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('chinhSuaNhaCungCap',$NhaCungCapDuocChon->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            @method('PUT')
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tên Admin</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên nhà cung cấp</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="input1-group1" name="TenNhaCungCap" placeholder="Nhập tên nhà cung cấp" class="form-control" value="{{ $NhaCungCapDuocChon->TenNhaCungCap }}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <span style="color:red" class="help-block">
                                            @error('TenNhaCungCap')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="email" id="input1-group1" name="Email" placeholder="Nhập Email" class="form-control" value="{{ $NhaCungCapDuocChon->Email }}">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <span style="color:red" class="help-block">
                                            @error('Email')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="tel" id="input1-group1" name="SoDienThoai" placeholder="Nhập số điện thoại" class="form-control" value="{{ $NhaCungCapDuocChon->SoDienThoai }}">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <span style="color:red" class="help-block">
                                            @error('SoDienThoai')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Được sửa chửa lần cuối bởi</label></div>
                                <div class="col-12 col-md-9">
                                    @foreach ($listAdmin as $listAdmin)
                                    @if ($NhaCungCapDuocChon->admin_id == $listAdmin->id)
                                        <input type="text" id="text-input" name="AdminId" placeholder="Nhập đơn giá của sản phẩm" readonly="" class="form-control" value="{{$listAdmin->name}}">
                                        @break
                                    @endif
                                    @if ($NhaCungCapDuocChon->admin_id == 0)
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
                            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Lưu</button>
                            <button style="float: right;" type="button" class="btn btn-warning" onClick="window.location.reload();"><i class="fa fa-retweet"></i>&nbsp; Reset</button>
                            <button style="float: right;" type="button" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-mail-reply"></i>&nbsp; Trở về</button>
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong>Inline</strong> Form
                    </div>
                    <div class="card-body card-block">
                        <form action="#" method="post" class="form-inline">
                            <div class="form-group"><label for="exampleInputName2" class="pr-1  form-control-label">Name</label><input type="text" id="exampleInputName2" placeholder="Jane Doe" required="" class="form-control"></div>
                            <div class="form-group"><label for="exampleInputEmail2" class="px-1  form-control-label">Email</label><input type="email" id="exampleInputEmail2" placeholder="jane.doe@example.com" required="" class="form-control"></div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </div>
            </div>


        </div>




    </div><!-- .animated -->
</div><!-- .content -->
@endsection

