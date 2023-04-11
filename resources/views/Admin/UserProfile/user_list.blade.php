@extends('Admin.Layout.layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Quản lý tài khoản người dùng</h1>
                        <p id="demo"></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Người dùng</a></li>
                            <li class="active">Danh sách người dùng</li>
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
                            <h4 class="alert-heading">Đã thay đổi thông tin người dùng thành công ! <span class="badge badge-pill badge-success">Success</span></h4> 
                            <hr>
                            <p class="mb-0">{{session('success')}} <br> Hãy kiểm tra thông tin người dùng lại.</p>
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
                            <h4 class="alert-heading">Đã xảy ra lỗi ! <span class="badge badge-pill badge-danger">Failed</span></h4> 
                            <hr>
                            <p class="mb-0">{{session('error')}} <br> Hãy kiểm tra lại </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    
                    </div>


                </div>


                
            </div>
        </div> <!-- .alerts -->
        @endif
        
        
        {{-- List người dùng --}}
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảng thông tin người dùng</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($ListUser as $user )
                                    <tr>
                                        <input type="hidden" class="delete_val_id" value="{{$user->id}}">
                                        {{-- <td>{{$i++;}}</td> --}}
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->isBan == 0)
                                                <button type="button" class="btn btn-success">Đang hoạt động</button>
                                            @else
                                                <button type="button" class="btn btn-danger">Đã bị khóa</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('showDetailUser', ['id'=>$user->id]) }}">
                                                <button  type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Xem chi tiết</button>
                                            </a>
                                            @if ($user->isBan == 0)
                                                
                                                <button  type="button" class="btn btn-warning btn-lock"><i class="fa fa-pencil"></i>&nbsp; Khóa tài khoản</button>
                                            @else
                                                
                                                <button  type="button" class="btn btn-warning btn-unlock"><i class="fa fa-pencil"></i>&nbsp; Mở khóa tài khoản</button>
                                            @endif
                                            {{-- <button  type="button" class="btn btn-secondary " ><i class="fa fa-eraser"></i>&nbsp; Xóa</button> --}}
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>0</td>
                                        <td>Chưa có người dùng trong database</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="">
                                                <button  type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Xem</button>
                                            </a>
                                            <a href="">
                                                <button  type="button" class="btn btn-warning"><i class="fa fa-pencil"></i>&nbsp; Xóa</button>
                                            </a>
                                            <br>
                                            <a href="">
                                                <button  type="button" class="btn btn-warning"><i class="fa fa-eraser"></i>&nbsp; Chỉnh sửa</button>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$ListUser->onEachSide(1)->links()}}
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
    {{-- <script src="{{ asset('back_assets/assets/js/init/datatables-init.js') }}"></script> --}}
    
    {{-- script cho modal thông báo --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script> --}}

    {{-- script cho chức năng khóa người dùng --}}
    <script>
        try {
            $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-lock').click( function (e) {
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.delete_val_id').val();
                // alert(delete_id);
                // $('#product_id').val(product_id);
                // $('#deleteModal').modal('show');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Bạn có chắc chắn không?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Tôi đã xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    reverseButtons: true,
                    input: 'text',
                    inputLabel: 'Hãy nhập lý do khóa tài khoản dưới đây',
                    inputPlaceholder: '',
                    inputAttributes: {
                        'aria-label': 'Nhập lý do khóa'
                    },
                    inputValidator: (value) => {
                        if (!value) {
                        return 'Cần phải có lý do để khóa tài khoản!'
                        }
                    }
                    
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    // console.log(result.value);

                    // swalWithBootstrapButtons.fire(
                    //     'Deleted!',
                    //     result.value,
                    //     'success'
                    // )
                    

                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id,
                        "note": result.value,
                    };
                    console.log(data);
                    $.ajax({
                        type: "POST",
                        url: '/ban-user/'+delete_id+'/'+result.value,
                        data: JSON.stringify(data),
                        success: function (response) {
                            swalWithBootstrapButtons.fire(
                                'Đã thay đổi trạng thái thành công !',
                                response.status,
                                // 'Sản phẩm đã bị xóa !',
                                'success'
                            ).then((result) =>{
                                location.reload();
                            });
                        }
                    });

                    
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Hủy bỏ !',
                        'Việc thay đổi trạng thái đã được hủy bỏ',
                        'error'
                    )
                }
                })

            });
        });
        } catch (error) {
            document.getElementById("demo").innerHTML = error.message; 
        }
        
    </script>
    
    {{-- script cho chức năng mở khóa người dùng --}}
    <script>
        try {
            $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-unlock').click( function (e) {
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.delete_val_id').val();
                // alert(delete_id);
                // $('#product_id').val(product_id);
                // $('#deleteModal').modal('show');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Bạn có chắc chắn không?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Tôi đã xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    reverseButtons: true,
                    input: 'text',
                    inputLabel: 'Hãy nhập ghi chú để mở khóa tài khoản dưới đây',
                    inputPlaceholder: '',
                    inputAttributes: {
                        'aria-label': 'Nhập lý do khóa'
                    },
                    inputValidator: (value) => {
                        if (!value) {
                        return 'Cần phải có ghi chú để mở khóa tài khoản!'
                        }
                    }
                    
                }).then((result) => {
                if (result.isConfirmed) {

                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id,
                        "note": result.value,
                    };

                    $.ajax({
                        type: "POST",
                        url: '/unban-user/'+delete_id+'/'+result.value,
                        data: JSON.stringify(data),
                        success: function (response) {
                            swalWithBootstrapButtons.fire(
                                'Đã thay đổi trạng thái thành công !',
                                response.status,
                                // 'Sản phẩm đã bị xóa !',
                                'success'
                            ).then((result) =>{
                                location.reload();
                            });
                        }
                    });

                    
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Hủy bỏ !',
                        'Việc thay đổi trạng thái đã được hủy bỏ',
                        'error'
                    )
                }
                })

            });
        });
        } catch (error) {
            document.getElementById("demo").innerHTML = error.message; 
        }
        
    </script>
@endsection