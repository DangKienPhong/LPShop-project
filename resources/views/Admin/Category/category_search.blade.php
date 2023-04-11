@extends('Admin.Layout.layout')
@section('content')


<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Danh sách danh mục</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">danh mục</a></li>
                            <li class="active">Danh sách danh mục</li>
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
                            <h4 class="alert-heading">Đã thay đổi thông tin danh mục thành công ! <span class="badge badge-pill badge-success">Success</span></h4> 
                            <hr>
                            <p class="mb-0">{{session('success')}} <br> Hãy kiểm tra thông tin danh mục lại.</p>
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

        {{-- Bảng lọc danh mục --}}
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảng lọc danh mục</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('filterDanhMuc')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="TenDanhMuc" id="select" class="form-control">
                                        <option value="">Xin chọn danh mục cha</option>
                                        @foreach ($listDanhMucCha as $danhMucCha)
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
                                    <input type="text" id="text-input" name="TenDanhMucCon" placeholder="Nhập tên danh mục con" class="form-control">
                                    <span style="color:red" class="help-block">
                                        @error('TenDanhMucCon')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Lọc danh mục</button>
                        </form>
                        
                    </div>
                </div>
            </div>


        </div>
        
        {{-- List sản phẩm --}}
        {{-- <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảng danh mục sản phẩm</strong>
                    </div>
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Tên danh mục con</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ListDanhMuc as $DanhMuc)
                                <tr>
                                    <input type="hidden" class="delete_val_id" value="{{$DanhMuc->id}}">
                                    <td>{{ $DanhMuc->id }}</td>
                                    <td>{{ $DanhMuc->TenDanhMuc }}</td>
                                    <td>{{ $DanhMuc->TenDanhMucCon }}</td>
                                    <td>
                                        <a href="{{ route('showDetailDanhMuc', ['id'=>$DanhMuc->id]) }}">
                                            <button  type="button" class="btn btn-warning"><i class="fa fa-pencil"></i>&nbsp; Sửa thông tin</button>
                                        </a>
                                        <button  type="button" class="btn btn-secondary "><i class="fa fa-eraser"></i>&nbsp; Xóa</button>
                                        
                                    </td>
                                    
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td>0</td>
                                    <td>Chưa có dữ liệu trong database</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        {{$ListDanhMuc->onEachSide(2)->links()}}
                    </div>
                </div>
            </div>


        </div> --}}
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

     {{-- script cho chức năng xóa --}}
     <script>
        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-secondary').click(function (e) {
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
                    text: "Bạn sẽ không thể khôi phục được dữ liệu sau khi xóa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Tôi đã xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {

                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: '/category-delete/'+delete_id,
                        data: data,
                        success: function (response) {
                            swalWithBootstrapButtons.fire(
                                'Đã xóa thành công !',
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
                        'Việc xóa danh mục sản phẩm đã được hủy bỏ',
                        'error'
                    )
                }
                })

            });
        });
    </script>

@endsection