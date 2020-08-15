@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Tài khoản</a></li>
    <li class="active">Nhân viên</li>
</ul>
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

        $checkPermissionAddRole = \DB::table('permissions')->where('name','create-role')->value('id');
        $checkPermissionEditRole = \DB::table('permissions')->where('name','edit-role')->value('id');
        $checkPermissionDeleteRole = \DB::table('permissions')->where('name','delete-role')->value('id');

        $checkPermissionViewEmployee = \DB::table('permissions')->where('name','view-user')->value('id');
        $checkPermissionAddEmployee = \DB::table('permissions')->where('name','create-user')->value('id');
        $checkPermissionEditEmployee = \DB::table('permissions')->where('name','edit-user')->value('id');
        $checkPermissionDeleteEmployee = \DB::table('permissions')->where('name','delete-user')->value('id');
    @endphp
<div class="page-content-wrap">

    <!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="page-head-text">
                        <h1 class="panel-title"><strong>Quản lý</strong> quản trị viên</h1>
                        <div class="form-group pull-right">
                        @if($listRoleOfUser->contains($checkPermissionAddRole))
                            <a href="{{ route('create.role')}}">
                                <button class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span> Thêm mới Nhóm Quyền</button>
                            </a>
                            @endif()

                            @if($listRoleOfUser->contains($checkPermissionAddEmployee))

                            <a href="{{ route('employee.user.create') }}">
                                <button class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span> Thêm mới nhân viên</button>
                            </a>        
                            @endif()
    
                        </div>
                        
                    </div>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">ID</th>
                                    <th>Nhóm</th>
                                    <th width="120" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                {{-- đổ dữ liễu các role  --}}
                                @php
                                $stt = 1;
                                @endphp
                                @if($groupUser)
                                @foreach($groupUser as $groupUser)
                                @if(!empty($groupUser->id))
                                <td>{{$stt++}}</td>
                                @else
                                <td></td>
                                @endif

                                @if(!empty($groupUser->name))

                                <td>{{$groupUser->name}}
                                    (<span style="color: #fea223">
                                        {{!empty($groupUser->users)?$groupUser->users->count():'0'}}
                                    </span> )
                                </td>
                                @else
                                <td></td>
                                @endif

                                <td class="text-center">
                                @if($listRoleOfUser->contains($checkPermissionViewEmployee))
                                    <a href="{{ route('employee.show', $groupUser -> id) }}">
                                        <button class="btn btn-warning btn-rounded btn-condensed btn-sm"><span class="fa fa-info"></span>
                                        </button>
                                    </a>
                                    @endif()

                                    @if($listRoleOfUser->contains($checkPermissionEditRole))
                                    <a href="{{ route('edit.role', $groupUser -> id) }}">
                                        <button   class="btn btn-primary btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button>
                                    </a>
                                    @endif()

                                    @if($listRoleOfUser->contains($checkPermissionDeleteRole))
                                    <a>
                                        <button class="btn btn-danger btn-rounded btn-condensed btn-sm notiDelete" data-id="{{$groupUser -> id}}"><span
                                                class="fa fa-times"></span></button>
                                        </button>
                                    </a>
                                    @endif()

                                    </td>

                                </tr>
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
                                                <button class="btn btn-warning btn-lg delRole">Xóa
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
            $('.delRole').click(function(){
               $.ajax({
                url: 'backend/role/destroy/'+id,
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