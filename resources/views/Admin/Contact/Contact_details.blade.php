@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh sách tin nhắn liên hệ</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Tin nhắn liên hệ</a></li>
                            <li class="active">Chi tiết tin nhắn</li>
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
                        <strong>Chi tiết tin nhắn</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('doiTrangThaiLienHe', ['id'=>$LienHe->id]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            @method('PUT')
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tên Admin</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID tin nhắn</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="id" placeholder="Nhập tên sản phẩm" class="form-control" disabled="" value="{{$LienHe->id}}">
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
                                    <input type="text" id="text-input" name="TieuDe" placeholder="Nhập tên sản phẩm" class="form-control" disabled="" value="{{$LienHe->TieuDe}}">
                                    <span style="color:red" class="help-block">
                                        @error('TieuDe')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Họ Tên Người Gửi</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenNguoiGui" placeholder="Nhập tên sản phẩm" class="form-control" disabled="" value="{{$LienHe->TenNguoiGui}}">
                                    <span style="color:red" class="help-block">
                                        @error('TenNguoiGui')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Công ty đại diện</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenCongTy" placeholder="Nhập tên sản phẩm" class="form-control" disabled="" value="{{$LienHe->TenCongTy}}">
                                    <span style="color:red" class="help-block">
                                        @error('TenCongTy')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="Email" placeholder="Nhập tên sản phẩm" class="form-control" disabled="" value="{{$LienHe->Email}}">
                                    <span style="color:red" class="help-block">
                                        @error('Email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung tin nhắn</label></div>
                                <div class="col-12 col-md-9"><textarea name="NoiDung" id="textarea-input" rows="15" placeholder="Nhập các chức năng" disabled="" class="form-control">{{$LienHe->NoiDung}}</textarea>
                                    <span style="color:red" class="help-block">
                                        @error('NoiDung')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>  
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Được sửa chửa lần cuối bởi</label></div>
                                <div class="col-12 col-md-9">
                                    @foreach ($listAdmin as $listAdmin)
                                    @if ($LienHe->admin_id == $listAdmin->id)
                                        <input type="text" id="text-input" name="AdminId" readonly="" class="form-control" value="{{$listAdmin->name}}">
                                        @break
                                    @endif
                                    @if ($LienHe->admin_id == 0)
                                        <input type="text" id="text-input" name="AdminId" readonly="" class="form-control" value="Cơ sở dữ liệu nhận tin nhắn liên hệ">
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
                            <a href="{{ route('doiTrangThaiLienHe', ['id'=>$LienHe->id]) }}">
                                <button style="float: right;" type="button" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Đánh dấu đã đọc tin nhắn</button>
                            </a>
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
