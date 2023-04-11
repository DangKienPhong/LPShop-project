@extends('Admin.Layout.layout')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Thông tin người dùng</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Danh sách người dùng</a></li>
                            <li class="active">Thông tin người dùng</li>
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
                        <strong>Thông tin chi tiết người dùng </strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">ID tài khoản</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" disabled="" id="delete_val_id"class="form-control" value="{{$UserDuocChon->id}}">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Người dùng</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="input1-group1" name="input1-group1"  placeholder="Tên Người dùng" class="form-control" value="{{$UserDuocChon->name}}" disabled="">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="email" id="input1-group1" name="input1-group1" disabled="" placeholder="Email" class="form-control" value="{{$UserDuocChon->email}}" disabled="">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="tel" id="input1-group1" name="input1-group1" disabled="" placeholder="Số điện thoại" class="form-control" value="{{$UserDuocChon->phone}}" disabled="">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Địa chỉ</label></div>
                                <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" disabled="" rows="5" placeholder="Địa chỉ giao hàng" class="form-control">{{$UserDuocChon->address}}</textarea></div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tình trạng</label></div>
                                <div class="col-12 col-md-9">
                                    @if ($UserDuocChon->isBan == 0)
                                    <button type="button" class="btn btn-success btn-lg btn-block">Đang hoạt động</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-lg btn-block">Đã bị khóa</button>
                                    @endif

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Ghi chú cho tài khoản</label></div>
                                <div class="col-12 col-md-9"><textarea name="note" id="textarea-input" rows="5" placeholder="Nhập ghi chú (Nếu khóa tài khoản người dùng thì phải ghi lý do vào mục này)" class="form-control" disabled="">@if (($UserDuocChon->note)){{$UserDuocChon->note}}@else Không có ghi chú @endif
                                </textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Được sửa chửa lần cuối bởi</label></div>
                                <div class="col-12 col-md-9">
                                    @foreach ($listAdmin as $listAdmin)
                                    @if ($UserDuocChon->admin_id == $listAdmin->id)
                                        <input type="text" id="text-input" name="AdminId" readonly="" class="form-control" value="{{$listAdmin->name}}">
                                        @break
                                    @endif
                                    @if ($UserDuocChon->admin_id == 0)
                                        <input type="text" id="text-input" name="AdminId" readonly="" class="form-control" value="Hệ thống tạo tự động">
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
                            <button style="float: right;" type="button" class="btn btn-primary btn-refresh-note"><i class="fa fa-retweet"></i>&nbsp; Xóa ghi chú</button>
                            @if ($UserDuocChon->isBan == 0)
                                <button style="float: right;" type="button" class="btn btn-warning btn-lock"><i class="fa fa-retweet"></i>&nbsp; Tiến hành khóa tài khoản</button>
                            @else
                                <button style="float: right;" type="button" class="btn btn-success btn-unlock"><i class="fa fa-check-circle"></i>&nbsp; Mở khóa tài khoản</button>
   
                            @endif
                            
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

  {{-- script cho modal thông báo --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- script cho chức năng xóa ghi chú --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-refresh-note').click(function(e){
                e.preventDefault();
                var delete_id = document.getElementById("delete_val_id").value;
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
                    text: "Bạn sẽ không thể hồi phục lại các ghi chú sau khi xóa !",
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
                        url: '/delete-user-note/'+delete_id,
                        data: data,
                        success: function (response) {
                            swalWithBootstrapButtons.fire(
                                'Xóa các ghi chú thành công !',
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
                        'Việc xóa ghi chú đã được hủy bỏ',
                        'error'
                    )
                }
                })
                
            });
      } );   
    </script>

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

              var delete_id = document.getElementById("delete_val_id").value;

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
                              'Thay đổi trạng thái thành công !',
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

              var delete_id = document.getElementById("delete_val_id").value;
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
                              'Thay đổi trạng thái thành công !',
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

