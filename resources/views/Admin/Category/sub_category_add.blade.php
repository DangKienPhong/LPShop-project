@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh Mục Sản Phẩm</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Danh Mục Sản Phẩm</a></li>
                            <li class="active">Thêm Danh Mục</li>
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
                            <h4 class="alert-heading"> {{session('success')}} <span class="badge badge-pill badge-success">Success</span></h4> 
                            <hr>
                            <p class="mb-0">Danh mục mới sẽ được hiển thị khi bạn xem danh sách danh mục sản phẩm. <br> Bạn có thể tiếp tục thêm sản phẩm khác ở Form thông tin dưới.</p>
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
                        <strong>Form Nhập thông tin Danh mục</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('luuDanhMuc') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            {{ csrf_field() }}
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tên Admin</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục </label></div>
                                <div class="col-12 col-md-9">
                                    <select name="TenDanhMuc" id="select" class="form-control">
                                        <option value="">Xin chọn danh mục cha</option>
                                        @foreach ($ListDanhMucCha as $danhMucCha)
                                            <option value="{{$danhMucCha->TenDanhMuc}}">{{$danhMucCha->TenDanhMuc}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red" class="help-block">
                                        @error('TenDanhMuc')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục con</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenDanhMucCon" placeholder="Nhập tên danh mục con" class="form-control" value="{{ old('TenDanhMucCon') }}">
                                    <span style="color:red" class="help-block">
                                        @error('TenDanhMucCon')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            
                            
                            
                            
                            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Lưu</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
                {{-- <div class="card">
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
                </div> --}}
            </div>

               
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection

