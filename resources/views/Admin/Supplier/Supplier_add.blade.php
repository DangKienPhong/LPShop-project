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
        @if (session('success'))
        <div class="alerts">
            <div class="row">
                <div class="col-md-12">

                    
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <h4 class="alert-heading">{{session('success')}} <span class="badge badge-pill badge-success">Success</span></h4> 
                            <hr>
                            <p class="mb-0">Thông tin của nhà cung cấp mới sẽ được hiển thị khi bạn xem danh sách nhà cung cấp. <br> Bạn có thể tiếp tục thêm sản phẩm khác ở Form thông tin dưới.</p>
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
                            <hr>
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

        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form Nhập thông tin nhà cung cấp</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('luuNhaCungCap') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên nhà cung cấp</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="input1-group1" name="TenNhaCungCap" placeholder="Nhập tên nhà cung cấp" class="form-control" value="{{ old('TenNhaCungCap') }}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i>
                                            <span style="color:red" class="help-block">
                                                @error('TenNhaCungCap')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="email" id="input1-group1" name="Email" placeholder="Nhập Email" class="form-control" value="{{ old('Email') }}">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i>
                                            <span style="color:red" class="help-block">
                                                @error('Email')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="tel" id="input1-group1" name="SoDienThoai" placeholder="Nhập số điện thoại" class="form-control"  value="{{ old('SoDienThoai') }}">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i>
                                            <span style="color:red" class="help-block">
                                                @error('SoDienThoai')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
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
                
            </div>

               
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection

