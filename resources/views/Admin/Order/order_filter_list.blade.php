@extends('Admin.Layout.layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh sách đơn hàng</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Đơn hàng</a></li>
                            <li class="active">Danh sách đơn hàng</li>
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

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảng lọc đơn hàng</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('filterDonHang')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Đơn Hàng</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="DonHangId" placeholder="Nhập id đơn hàng" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Người Nhận</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="TenNguoiNhan" placeholder="Nhập tên người nhận" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số Điện Thoại</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="SoDienThoai" placeholder="Nhập số điện thoại" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="Email" placeholder="Nhập email" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Địa Chỉ</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="DiaChi" placeholder="Nhập địa chỉ" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Phương Thức Thanh Toán</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="PhuongThucThanhToan" value="COD" class="form-check-input">COD
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="PhuongThucThanhToan" value="Momo" class="form-check-input" >Momo
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="PhuongThucThanhToan" value="VNPAY" class="form-check-input" >VNPAY
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã Giao Dịch</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="MaGiaoDich" placeholder="Nhập mã giao dịch" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tình trạng sản phẩm</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="TinhTrang" value="Chờ Phê Duyệt" class="form-check-input">Chờ Phê Duyệt
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="TinhTrang" value="Đang Vận Chuyển" class="form-check-input" >Đang Vận Chuyển
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="TinhTrang" value="Nhận Thành Công" class="form-check-input" >Nhận Thành Công
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="TinhTrang" value="Hủy Đơn Hàng" class="form-check-input" >Hủy Đơn Hàng
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Lọc đơn hàng</button>
                        </form>
                        
                    </div>
                </div>
            </div>


        </div>
        
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh sách đơn hàng</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id đơn hàng</th>
                                    <th>Tên Người Nhận</th>
                                    <th>Ngày nhận đơn</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Tình trạng</th>
                                    <th>Thành tiền</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($listDonHang as $DonHang )
                                <tr>
                                    <input type="hidden" class="delete_val_id" value="{{$DonHang->id}}">
                                    <td>{{$DonHang->id}}</td>
                                    <td>{{$DonHang->TenNguoiNhan}}</td>
                                    <td>{{date('d/m/Y', strtotime($DonHang->created_at))}}</td>
                                    <td>{{$DonHang->SoDienThoai}}</td>
                                    <td>{{$DonHang->Email}}</td>
                                    <td>
                                        @if ($DonHang->TinhTrang == 'Nhận đơn hàng')
                                            <button type="button" class="btn btn-info">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Chờ Phê Duyệt')
                                            <button type="button" class="btn btn-danger">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Đang Vận Chuyển')
                                            <button type="button" class="btn btn-warning">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Nhận Thành Công') 
                                            <button type="button" class="btn btn-success">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Hủy Đơn Hàng') 
                                            <button type="button" class="btn btn-danger">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Chưa Thanh Toán') 
                                            <button type="button" class="btn btn-danger">{{$DonHang->TinhTrang}}</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary">{{number_format($DonHang->ThanhTien, 0, '', '.')}}</button>
                                    </td>
                                    <td>
                                        @if ($DonHang->PhuongThucThanhToan == 'COD')
                                            <button type="button" class="btn btn-success">{{$DonHang->PhuongThucThanhToan}}</button>
                                        @else
                                            <button type="button" class="btn btn-primary">{{$DonHang->PhuongThucThanhToan}}</button>   
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('showDetailDonHang', ['id'=>$DonHang->id]) }}">
                                            <button  type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Xem đơn hàng</button>
                                        </a>
                                        <br>
                                        @if ($DonHang->TinhTrang == 'Nhận đơn hàng')
                                            <button  type="button" class="btn btn-danger btn-cancel"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Hủy đơn hàng</button> 
                                        @elseif ($DonHang->TinhTrang == 'Chờ Phê Duyệt')
                                            <button  type="button" class="btn btn-danger btn-cancel"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Hủy đơn hàng</button>  
                                        @elseif ($DonHang->TinhTrang == 'Đang Vận Chuyển')
                                            <button  type="button" class="btn btn-success btn-order-success"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Nhận thành công</button>
                                            <br>
                                            <button  type="button" class="btn btn-danger btn-cancel"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Hủy đơn hàng</button>
                                        @elseif ($DonHang->TinhTrang == 'Chưa Thanh Toán')
                                            <button  type="button" class="btn btn-danger btn-cancel"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Hủy đơn hàng</button>
                                        @endif
                                       
                                        
                                           
                                        
                                    </td>
                                </tr> 
                                @empty
                                <tr>
                                    <td>0</td>
                                    <td>Chưa có đơn hàng nào được đặt</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        
                                        
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                           
                        </table>
                        {{$listDonHang->onEachSide(1)->links()}}
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

    {{-- script cho chức năng nhận đơn hàng thành công --}}
    <script>
        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-order-success').click(function (e) {
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
                    text: "Bạn sẽ không thể thay đổi lại trạng thái của đơn hàng sau khi thay đổi !",
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
                        type: "POST",
                        url: '/order-change-status-to-success/'+delete_id,
                        data: data,
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
    </script>

    {{-- script cho chức năng hủy đơn hàng --}}
    <script>
        try {
            $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-cancel').click( function (e) {
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
                    inputLabel: 'Hãy nhập lý do hủy đơn hàng dưới đây',
                    inputPlaceholder: '',
                    inputAttributes: {
                        'aria-label': 'Nhập lý do hủy'
                    },
                    inputValidator: (value) => {
                        if (!value) {
                        return 'Cần phải có lý do hủy đơn hàng !'
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
                        url: '/order-change-status-to-cancel/'+delete_id+'/'+result.value,
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