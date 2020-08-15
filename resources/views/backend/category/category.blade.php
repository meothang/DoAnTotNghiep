@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Danh mục</a></li>
    <li class="active">Danh sách danh mục</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-head-text">
                        <h3 class="panel-title"><strong>Quản lý </strong>danh mục</h3>
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
                        
                        $checkPermissionAddCategory = \DB::table('permissions')->where('name','create-category')->value('id');
                        $checkPermissionEditCategory = \DB::table('permissions')->where('name','edit-category')->value('id');
                        $checkPermissionDeleteCategory = \DB::table('permissions')->where('name','delete-category')->value('id');
                        
                        @endphp

                        @if($listRoleOfUser->contains($checkPermissionAddCategory))
                        <a href="{{ route('admin.get.create.category')}}">
                            <button class="btn btn-primary btn-rounded pull-right"><span class="fa fa-plus"></span> Thêm
                            danh mục</button>
                        </a>
                        @endif()
                    </div>
                </div>
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">ID</th>
                                    <th>Tên nhà cung cấp</th>
                                    <th width="150" class="text-center">Nổi bật</th>
                                    <th width="200" class="text-center">Ngày nhập</th>
                                    <th width="120" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($categories))
                                @foreach($categories as $category )
                                <tr>
                                    <td class="text-center">{{ $category->id }}</td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td class="text-center">{{ $category->cate_status }}</td>
                                    <td class="text-center">{{ date_format($category->created_at,'d/m/Y H:i:s') }}</td>
                                    <td class="text-center">
                                    @if($listRoleOfUser->contains($checkPermissionEditCategory))
                                        <a href="{{ route('admin.get.edit.category',$category->id) }}">
                                            <button class="btn btn-primary btn-rounded btn-condensed btn-sm">
                                                <span class="fa fa-pencil"></span></button>
                                        </a>
                                    @endif()
                                    @if($listRoleOfUser->contains($checkPermissionDeleteCategory))
                                        <a>
                                            <button class="btn btn-danger btn-rounded btn-condensed btn-sm notiDelete" data-id="{{$category -> id}}"><span
                                                class="fa fa-times"></span></button>
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
                                                        <button class="btn btn-warning btn-lg delCate">Xóa
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
            </div>
        </div>
        <!-- END RESPONSIVE TABLES -->
        @stop
        @section('script')
        <script>
            $(".notiDelete").click(function(){
                $("#mb-remove-row").addClass("open");
                let id = $(this).data('id');
                $('.delCate').click(function(){
                   $.ajax({
                    url: 'backend/category/delete/'+id,
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