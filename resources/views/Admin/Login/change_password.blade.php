@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Thay Đổi Password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Thay đổi password</li>
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
                            <p class="mb-0">Thông tin mới đã được cập nhật !</p>
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
                            <h4 class="alert-heading">{{session('error')}} <span class="badge badge-pill badge-danger">Failed</span></h4> 
                            <hr>
                            <p class="mb-0">Xin hãy nhập lại password cũ !</p>
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
                            <h4 class="alert-heading">Không thể thay dổi mật khẩu! <span class="badge badge-pill badge-danger">Failed</span></h4> 
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
                        <strong>Form thông tin</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('doiPassword') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password hiện tại</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="password" id="input1-group1" name="old_password" placeholder="Nhập password hiện tại" class="form-control" value="{{ old('old_password') }}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                    <span style="color:red" class="help-block">
                                        @error('old_password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password mới</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="password" id="input1-group1" name="new_password" placeholder="Nhập password mới" class="form-control" value="{{ old('new_password') }}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                    <span style="color:red" class="help-block">
                                        @error('new_password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Xác nhận Password mới</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="password" id="input1-group1" name="comfirmed_password" placeholder="Nhập lại password mới" class="form-control" value="{{ old('comfirmed_password') }}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>  
                                    </div>
                                    <span style="color:red" class="help-block">
                                        @error('comfirmed_password')
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
                
            </div>

               
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection

