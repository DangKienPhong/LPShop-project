@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Chi tiết đơn hàng</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('showListDonHang')}}">Đơn hàng</a></li>
                            <li class="active">Chi tiết đơn hàng</li>
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
                        <strong>Chi tiết đơn hàng </strong> 
                    </div>
                    <div class="card-body card-block">
                        {{-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> --}}
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Admin duyệt đơn</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Mã đơn hàng</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" disabled="" id="cancel_val_id"class="form-control" value="{{$DonHangDuocChon->id}}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Người nhận hàng</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="input1-group1" name="input1-group1" disabled="" placeholder="Tên người nhận" class="form-control" value="{{$DonHangDuocChon->TenNguoiNhan}}">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày đặt đơn</label></div>
                                <div class="col-12 col-md-9">
                                    <input id="cc-exp" name="cc-exp" type="tel" disabled="" class="form-control cc-exp" readonly="" value="{{date('d/m/Y', strtotime($DonHangDuocChon->created_at))}}">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày giao đơn</label></div>
                                <div class="col-12 col-md-9">
                                    <input id="cc-exp" name="cc-exp" type="tel" disabled="" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid date" placeholder="DD / MM / YY">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Địa chỉ giao hàng</label></div>
                                <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input"  rows="5" placeholder="Địa chỉ giao hàng" class="form-control" readonly="">{{$DonHangDuocChon->DiaChi}}</textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="tel" id="input1-group1" name="input1-group1" disabled="" placeholder="Số điện thoại" class="form-control" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" readonly="" value="{{$DonHangDuocChon->SoDienThoai}}">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="email" id="input1-group1" name="input1-group1" disabled="" placeholder="Email" class="form-control" readonly="" value="{{$DonHangDuocChon->Email}}">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Thành tiền</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="input3-group1" name="input3-group1" placeholder="Tổng tiền đơn hàng" class="form-control" readonly="" value="{{ number_format($DonHangDuocChon->ThanhTien , 0, '', '.')}}">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Phương thức thanh toán</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                            <input type="radio" id="inline-radio1" name="PhuongThucThanhToan" disabled="" value="COD" class="form-check-input"
                                            @if ($DonHangDuocChon->PhuongThucThanhToan == "COD") checked @endif>Nhận tiền khi đưa hàng
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="PhuongThucThanhToan" disabled="" value="Momo" class="form-check-input"
                                            @if ($DonHangDuocChon->PhuongThucThanhToan == "Momo") checked @endif>Momo
                                        </label>
                                        &nbsp;
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="PhuongThucThanhToan" disabled="" value="VNPAY" class="form-check-input"
                                            @if ($DonHangDuocChon->PhuongThucThanhToan == "VNPAY") checked @endif>VNPAY
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tình trạng</label></div>
                                <div class="col-12 col-md-9">
                                    
                                    @if ($DonHangDuocChon->TinhTrang == 'Nhận đơn hàng')
                                        <button type="button" class="btn btn-success btn-lg btn-block">{{$DonHangDuocChon->TinhTrang}}</button>
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Đang Vận Chuyển')
                                        <button type="button" class="btn btn-warning btn-lg btn-block">{{$DonHangDuocChon->TinhTrang}}</button>   
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Nhận Thành Công')
                                        <button type="button" class="btn btn-success btn-lg btn-block">{{$DonHangDuocChon->TinhTrang}}</button>   
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Hủy Đơn Hàng')
                                        <button type="button" class="btn btn-danger btn-lg btn-block">{{$DonHangDuocChon->TinhTrang}}</button>   
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Chưa Thanh Toán')
                                        <button type="button" class="btn btn-danger btn-lg btn-block">{{$DonHangDuocChon->TinhTrang}}</button>   
                                    @elseif ($DonHangDuocChon->TinhTrang == 'Chờ Phê Duyệt')
                                        <button type="button" class="btn btn-danger btn-lg btn-block">{{$DonHangDuocChon->TinhTrang}}</button>   
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Ghi chú</label></div>
                                <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" disabled="" rows="5" placeholder="Ghi chú đơn hàng" class="form-control" readonly="">{{$DonHangDuocChon->GhiChu}}</textarea></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lịch sử đơn hàng</label></div>
                                <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" disabled="" rows="5" placeholder="Ghi chú đơn hàng" class="form-control" readonly="">{{$DonHangDuocChon->LichSuDonHang}}</textarea></div>
                            </div>

                            @if ($DonHangDuocChon->MaGiaoDich != NULL)
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã Giao Dịch</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class="input-group">
                                            <input type="text" id="input1-group1" name="input1-group1" disabled="" placeholder="Mã Giao Dịch" class="form-control" value="{{$DonHangDuocChon->MaGiaoDich}}">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Được sửa chửa lần cuối bởi</label></div>
                                <div class="col-12 col-md-9">
                                    @foreach ($listAdmin as $listAdmin)
                                    @if ($DonHangDuocChon->admin_id == $listAdmin->id)
                                        <input type="text" id="text-input" name="AdminId" readonly="" class="form-control" value="{{$listAdmin->name}}">
                                        @break
                                    @endif
                                    @if ($DonHangDuocChon->admin_id == 0)
                                        <input type="text" id="text-input" name="AdminId" readonly="" class="form-control" value="Cơ sở dữ liệu nhận đơn hàng">
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

                            @if ($DonHangDuocChon->TinhTrang == 'Chờ Phê Duyệt')
                                <button style="float: right;" type="button" class="btn btn-primary btn-delivery"><i class="fa fa-check-circle"></i>&nbsp; Tiến hành giao hàng</button>
                                <button style="float: right;" type="button" class="btn btn-danger btn-cancel"><i class="fa fa-retweet"></i>&nbsp; Hủy đơn hàng</button>
                            @elseif ($DonHangDuocChon->TinhTrang == 'Đang Vận Chuyển')
                                <button style="float: right;" type="button" class="btn btn-success btn-order-success"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Nhận thành công</button>
                                <button style="float: right;" type="button" class="btn btn-danger btn-cancel"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Hủy đơn hàng</button>
                            @elseif ($DonHangDuocChon->TinhTrang == 'Chưa Thanh Toán')
                                <button style="float: right;" type="button" class="btn btn-danger btn-cancel"><i class="fa fa-arrow-circle-o-right"></i>&nbsp; Hủy đơn hàng</button>
                            @endif
                            <button style="float: right;" type="button" class="btn btn-warning" onClick="window.location.reload();"><i class="fa fa-retweet"></i>&nbsp; Reset</button>
                            <button style="float: right;" type="button" class="btn btn-secondary" onclick="history.back()"><i class="fa fa-mail-reply"></i>&nbsp; Trở về</button>
                           {{-- </form> --}}
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Các sản phẩm trong đơn hàng</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    {{-- Thêm 1 khung tổng tiền sản phẩm --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ChiTietDonHangDuocChon as $ChiTiet)
                                <tr>
                                    <td>{{$ChiTiet->san_pham_id}}</td>
                                    <td>{{$ChiTiet->TenSanPham}}</td>
                                    <td>{{$ChiTiet->SoLuong}}</td>
                                    <td>{{$ChiTiet->DonGia}}</td>
                                </tr> 
                                @empty
                                <tr>
                                    <td>Không có sản phẩm trong đơn hàng</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>  
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">
                        <strong style="float: right;" class="card-title"><i class="fa fa-check-square"></i>&nbsp;Tổng đơn hàng: &nbsp; <button  type="button" class="btn btn-primary">{{number_format($DonHangDuocChon->ThanhTien, 0, '', '.')}}</button>&nbsp; VND</strong>
                    </div>
                    
                    <div class="card-footer">
                        <strong style="float: right;" class="card-title">Build by LPSHOP</strong>
                    </div>
                </div>
            </div>

               
        </div>

    


    </div><!-- .animated -->
</div><!-- .content -->
@endsection
@section('scripts')
    <!-- Scripts -->
    {{-- script cho modal thông báo --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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

                var delete_id = document.getElementById("cancel_val_id").value;
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

    {{-- script cho chức năng chuyển đơn hàng thành vận chuyển --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-delivery').click(function(e){
                e.preventDefault();
                var delete_id = document.getElementById("cancel_val_id").value;
                // alert(delete_id);
                

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Bạn có chắc chắn không?',
                    text: "Bạn sẽ không thể đổi trạng thái về lại ban đầu !",
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
                        url: '/order-change-status-to-delivery/'+delete_id,
                        data: data,
                        success: function (response) {
                            swalWithBootstrapButtons.fire(
                                'Đã thay đổi tình trạng thành công !',
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
        } );   
    </script>

    {{-- script cho chức năng nhận đơn hàng thành công --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-order-success').click(function(e){
                e.preventDefault();
                var delete_id = document.getElementById("cancel_val_id").value;
                // alert(delete_id);
                

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Bạn có chắc chắn không?',
                    text: "Bạn sẽ không thể đổi trạng thái về lại ban đầu !",
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
                                'Đã thay đổi tình trạng thành công !',
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
        } );   
    </script>
@endsection

