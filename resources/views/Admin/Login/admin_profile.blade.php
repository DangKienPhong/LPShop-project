@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Thông tin Admin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Thông tin Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">Thông Tin Quản Trị Viên</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src=" {{ asset('back_assets/images/admin.jpg') }} " alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">{{ Auth::guard('admin')->user()->name }}</h5>
                        <div class="location text-sm-center"><i class="fa fa-phone"></i> {{ Auth::guard('admin')->user()->phone }}</div>
                        <div class="location text-sm-center"><i class="fa fa-bell"></i> {{ Auth::guard('admin')->user()->email }}</div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <a href="https://www.stu.edu.vn/" target="blank"><i class="fa fa-briefcase"></i> Trường Đại Học Công Nghệ Sài Gòn </a> <br>
                        <a href="#"><i class="fa fa-map-marker"></i> 180 Đ. Cao Lỗ, Phường 4, Quận 8, Thành phố Hồ Chí Minh </a> <br>
                        <a href="#"><i class="fa fa-phone"></i> 028 3850 5520</a>
                        
                    </div>
                </div>
            </div>
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection

