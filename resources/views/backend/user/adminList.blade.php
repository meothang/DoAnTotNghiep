@extends('backend.layouts.backend-master')
@section('backend-main')
@php
        $listRoleOfUser = \DB::table('users')
        ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->join('roles', 'user_roles.role_id', '=', 'roles.id')
        ->where('users.id',Auth()->user()->id)
        ->select('roles.*')
        ->get()->pluck('id')->toArray();


        $listRoleOfUser = \DB::table('roles')
        ->join('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
        ->join('permissions','role_permissions.permission_id', '=', 'permissions.id')
        ->whereIn('roles.id',$listRoleOfUser) // lấy giá trị tại id
        ->select('permissions.*')
        ->get()->pluck('id')->unique();

        $checkPermissionEditEmployee = \DB::table('permissions')->where('name','edit-user')->value('id');
        $checkPermissionDeleteEmployee = \DB::table('permissions')->where('name','delete-user')->value('id');
    @endphp
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Tài khoản</a></li>
    <li class="active">Quản Trị Viên</li>
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
                        <h1 class="panel-title"><strong>Quản lý</strong> Quản Trị Viên</h1>
                    </div>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">ID</th>
                                    <th class="text-center" width="150">Tên tài khoản</th>
                                    <th width="100">Giới Tính</th>
                                    <th width="200" class="text-center">Email</th>
                                    <th width="120" class="text-center">Số điện thoại</th>
                                    <th width="300" class="text-center">Địa chỉ</th>
                                    <th width="300" class="text-center">Quyền</th>
                                    <th width="120" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($users))
                                @foreach ($users as $key =>  $user)

                                <tr id="trow_3">
                                    <td class="text-center">{{ $user -> userid}}</td>
                                    <td class="text-center"><strong>{{$user -> username}}</strong></td>
                                    <td class="text-center">
                                       @if ($user -> sex == 1)
                                       {{'Nam'}}
                                       @else
                                       {{'Nữ'}}
                                       @endif
                                   </td>
                                   <td class="text-center">{{$user -> email}}</td>
                                   <td class="text-center">{{$user -> phone}}</td>
                                   <td class="text-center">{{$user -> address}}</td>
                                   <td class="text-center">{{$user -> name}}</td>
                                   <td class="text-center">
                                   @if($listRoleOfUser->contains($checkPermissionEditEmployee))
                                       <a href="{{ route('employee.user.edit', $user ->userid) }}">
                                        <button
                                        class="btn btn-primary btn-rounded btn-condensed btn-sm"><span
                                        class="fa fa-pencil"></span></button>
                                    </a>
                                    @endif()

                                    @if($listRoleOfUser->contains($checkPermissionDeleteEmployee))

                                        <a>
                                           <button class="btn btn-danger btn-rounded btn-condensed btn-sm notiDelete" data-id="{{$user -> userid}}"><span
                                            class="fa fa-times"></span></button>
                                        </a>
                                        @endif()

                                    </td>
                                </tr>
                                <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
                                    <div class="mb-container">
                                        <div class="mb-middle">
                                            <div class="mb-title"><span class="fa fa-times"></span> Xác nhận
                                                <strong>Xóa Quản Trị Viên</strong> ?</div>
                                                <div class="mb-content">
                                                    <p>Nếu bạn muốn xóa người này</p>
                                                    <p>Hãy ấn XÓA</p>
                                                </div>
                                                <div class="mb-footer">
                                                    <div class="pull-right">
                                                       <button class="btn btn-warning btn-lg delAdminUser">Xóa
                                                       </button>
                                                       <button class="btn btn-default btn-lg mb-control-close">Hủy</button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- END MESSAGE BOX-->
                                   @endforeach
                                   @endif
                               </tbody>
                           </table>
                           
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
        $('.delAdminUser').click(function(){
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
                $("#mb-remove-row").addClass("hide");
                init_reload();
                        function init_reload(){
                            setInterval( function() {
                             window.location.reload();

                         },1000);
                        }
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