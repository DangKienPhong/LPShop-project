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
                            <li class="active">Lịch sử đơn hàng đã xử lý</li>
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
                        <strong class="card-title">Danh sách đơn hàng đã được xử lý</strong>
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
                                @forelse ($listLichSuDonHang as $DonHang )
                                <tr>
                                    <input type="hidden" class="delete_val_id" value="{{$DonHang->id}}">
                                    <td>{{$DonHang->id}}</td>
                                    <td>{{$DonHang->TenNguoiNhan}}</td>
                                    <td>{{$DonHang->created_at}}</td>
                                    <td>{{$DonHang->SoDienThoai}}</td>
                                    <td>{{$DonHang->Email}}</td>
                                    <td>
                                        @if ($DonHang->TinhTrang == 'Nhận đơn hàng')
                                            <button type="button" class="btn btn-info">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Đang Vận Chuyển')
                                            <button type="button" class="btn btn-warning">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Nhận Thành Công') 
                                            <button type="button" class="btn btn-success">{{$DonHang->TinhTrang}}</button>
                                        @elseif ($DonHang->TinhTrang == 'Hủy Đơn Hàng') 
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
                                        
                                        
                                        <button  type="button" class="btn btn-secondary btn-delete " ><i class="fa fa-eraser"></i>&nbsp; Xóa đơn hàng</button>
                                        
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
                        {{$listLichSuDonHang->onEachSide(1)->links()}}
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

    {{-- script cho chức năng xóa đơn hàng --}}
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
                        url: '/order-delete/'+delete_id,
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
                        'Việc xóa sản phẩm đã được hủy bỏ',
                        'error'
                    )
                }
                })

            });
        });
    </script>

    
@endsection