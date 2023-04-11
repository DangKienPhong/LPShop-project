@extends('Admin.Layout.layout')
@section('content')


<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Danh sách sản phẩm</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Sản Phẩm</a></li>
                            <li class="active">Danh sách sản phẩm</li>
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

        {{-- Bảng lọc sản phẩm --}}
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảng lọc sản phẩm</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('FilterSanPham')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Sản Phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="SanPhamId" placeholder="Nhập id sản phẩm" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenSanPham" placeholder="Nhập tên sản phẩm" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục sản phẩm</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="danh_muc_id" id="select" class="form-control">
                                        <option value="">Xin chọn danh mục của sản phẩm</option>
                                        @foreach ($listDanhMuc as $danhMuc)
                                            <option value="{{$danhMuc->id}}">{{$danhMuc->TenDanhMucCon}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Nhà Cung Cấp</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="nha_cung_cap_id" id="select" class="form-control">
                                        <option value="">Xin chọn nhà cung cấp</option>
                                        @foreach ($listNhaCungCap as $nhaCungCap)
                                            <option value="{{$nhaCungCap->id}}">{{$nhaCungCap->TenNhaCungCap}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tình trạng sản phẩm</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="TinhTrang" value="1" class="form-check-input" checked>Đang hiển thị
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="TinhTrang" value="0" class="form-check-input" >Không hiển thị
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Hỗ trợ Bluetooth</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="HoTroBluetooth" value="Có" class="form-check-input">Có hỗ trợ
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="HoTroBluetooth" value="Không" class="form-check-input" >Không hỗ trợ
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">CPU</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="CPU" placeholder="Nhập CPU" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">GPU</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="GPU" placeholder="Nhập GPU" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">RAM</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="RAM" placeholder="Nhập RAM" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bộ Nhớ Trong</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="BoNhoTrong" placeholder="Nhập tên sản phẩm" class="form-control">
                                    
                                </div>
                            </div>
                            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Lọc sản phẩm</button>
                        </form>
                        
                    </div>
                </div>
            </div>


        </div>
        
        {{-- List sản phẩm --}}
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh sách sản phẩm tìm được</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục sản phẩm</th>
                                    <th>Tình trạng</th>
                                    <th>Số lượng trong kho</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Đơn giá (VNĐ)</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($listSanPham as $sanpham )
                                    <tr>
                                        <input type="hidden" class="delete_val_id" value="{{$sanpham->id}}">

                                        <td>{{$sanpham->id}}</td>
                                        <td><img  src="/product_images/{{$sanpham->tenhinhanh}}" class="img-fluid" alt="" ></td>
                                        <td>{{$sanpham->TenSanPham}}</td>
                                        <td>
                                            
                                            @foreach ($listDanhMuc as $danhMuc)
                                                @if ($danhMuc->id == $sanpham->danh_muc_id)
                                                    {{$danhMuc->TenDanhMucCon}}
                                                    @break;
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($sanpham->TinhTrang != 0)
                                                <button type="button" class="btn btn-success">Đang hiển thị</button>
                                            @else
                                                <button type="button" class="btn btn-danger">Không hiển thị</button>
                                            @endif
                                            <br>
                                            <hr>
                                            <button  type="button" class="btn btn-warning btn-change"><i class="fa fa-pencil"></i>&nbsp; Đổi tình trạng</button>
                                        </td>
                                        <td>{{$sanpham->SoLuongTrongKho}}</td>
                                        <td>
                                            @foreach ($listNhaCungCap as $nhaCungCap)
                                                @if ($nhaCungCap->id == $sanpham->nha_cung_cap_id)
                                                    {{$nhaCungCap->TenNhaCungCap}}
                                                    @break;
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> 
                                            <button type="button" class="btn btn-primary">{{number_format($sanpham->DonGia, 0, '', '.')}}</button>
                                            
                                        </td>
                                        <td>
                                            <a href="{{ route('showDetailSanPham', ['id'=>$sanpham->id]) }}">
                                                <button  type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Xem chi tiết</button>
                                            </a>
                                            <br>
                                            <a href="{{ route('getSanPham', ['id'=>$sanpham->id]) }}">
                                                <button  type="button" class="btn btn-warning"><i class="fa fa-pencil"></i>&nbsp; Sửa thông tin</button>
                                            </a>
                                            <br>
                                            
                                                <button  type="button" class="btn btn-secondary " ><i class="fa fa-eraser"></i>&nbsp; Xóa</button>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>0</td>
                                        <td>Chưa có sản phẩm trong database</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                        {{-- {{$listSanPham->onEachSide(1)->links()}} --}}
                        {!! $listSanPham->onEachSide(1)->appends(request()->input())->links() !!}
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

    {{-- script cho chức năng thay đổi tình trạng sản phẩm --}}
    <script>
        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-change').click(function (e) {
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
                    text: "Bạn có thể đổi trạng thái về lại ban đầu nếu muốn",
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
                    console.log(data);
                    $.ajax({
                        type: "POST",
                        url: '/product-change-status/'+delete_id,
                        data: data,
                        success: function (response) {
                            swalWithBootstrapButtons.fire(
                                'Đã thay đổi tình trạng sản phẩm thành công !',
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
    </script>

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
                        url: '/product-delete/'+delete_id,
                        data: data,
                        success: function (response) {
                            if(response.success){
                                swalWithBootstrapButtons.fire(
                                    'Đã xóa thành công !',
                                    response.success,
                                    // 'Sản phẩm đã bị xóa !',
                                    'success'
                                ).then((result) =>{
                                    location.reload();
                                });
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Hủy bỏ việc xóa danh mục !',
                                    response.cancel,
                                    'error'
                                )
                            }
                        }
                    });

                    
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Hủy bỏ !',
                        'Việc xóa sản phẩm đã được hủy bỏ',
                        'error'
                    )
                }
                })

            });
        });
    </script>
@endsection