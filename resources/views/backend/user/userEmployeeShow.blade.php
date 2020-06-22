@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Tài khoản</a></li>
    <li class="active">Quản lý danh sách quản trị</li>
</ul>
<!-- END BREADCRUMB -->
{{-- <!-- PAGE TITLE -->
 <div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span> Sortable Tables</h2>
</div>
<!-- END PAGE TITLE --> --}}

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="page-head-text">
                        <h1 class="panel-title"><strong>Danh sách</strong> Administrator</h1>
                    </div>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">ID</th>
                                    <th width="200" class="text-center">Tên quản trị viên</th>
                                    <th class="text-center" width="120">Giới tính</th>
                                    {{-- <th width="100">status</th>
                                    <th width="100">amount</th> --}}
                                    <th width="200" class="text-center">Email</th>
                                    <th width="120" class="text-center">Số điện thoại</th>
                                    <th width="300" class="text-center">Địa chỉ</th>
                                    <th width="120" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $stt = 1;
                                @endphp
                                @if (!empty($listUser[0]['users']))
                                @foreach ($listUser[0]['users'] as $user)
                                @if (!empty($user['id']))
                                <tr id="trow_3">
                                   <td class="text-center">{{$stt++}}</td>
                                   <td class="text-center"><strong>{{$user['name']}}</strong></td>
                                   <td class="text-center"><strong>
                                    @if ($user['sex'] == 1)
                                    {{'Nam'}}
                                    @else
                                    {{'Nữ'}}
                                    @endif
                                </strong></td>

                                <td class="text-center">{{$user['email']}}</td>
                                <td class="text-center">{{$user['phone']}}</td>
                                <td class="text-center">{{$user['address']}}</td>
                                <td class="text-center">
                                    <a href="{{ route('employee.user.edit', $user['id']) }}">
                                        <button
                                        class="btn btn-primary btn-rounded btn-condensed btn-sm"><span
                                        class="fa fa-pencil"></span></button></a>
                                        <a>
                                            <button class="btn btn-danger btn-rounded btn-condensed btn-sm notiDelete" data-id="{{$user['id']}}"><span
                                                class="fa fa-times"></span></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
                                <div class="mb-container">
                                    <div class="mb-middle">
                                        <div class="mb-title"><span class="fa fa-times"></span> Xác nhận
                                            <strong>xóa</strong> ?</div>
                                            <div class="mb-content">
                                                <p>Nếu bạn muốn xóa mục này</p>
                                                <p>Hãy ấn XÓA</p>
                                            </div>
                                            <div class="mb-footer">
                                                <div class="pull-right">
                                                    <button class="btn btn-warning btn-lg delListUser">Xóa
                                                    </button>
                                                    <button class="btn btn-default btn-lg mb-control-close">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MESSAGE BOX-->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- END RESPONSIVE TABLES -->

        </div>
        <!-- PAGE CONTENT WRAPPER -->
        @stop
        @section('script')
        <script>
            $(".notiDelete").click(function(){
                $("#mb-remove-row").addClass("open");
                let id = $(this).data('id');
                $('.delListUser').click(function(){
                   $.ajax({
                    url: 'backend/user/delete/'+id,
                    data:{
                        id: id,

                    },
                    dataType: 'json',
                    type:'get',
                    success:function($result){ 
                      if ($result.success) {
                        toastr.success($result.success, 'Thông Báo',{timeOut: 3000});
                        location.reload();
                    }else {
                     toastr.error($result.error, 'Thông Báo',{timeOut: 3000});
                     // location.reload();
                 }
             }

         });

               });
            });
        </script>
        @stop