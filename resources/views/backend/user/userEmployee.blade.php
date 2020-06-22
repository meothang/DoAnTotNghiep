@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Tài khoản</a></li>
    <li class="active">Nhân viên</li>
</ul>

<div class="page-content-wrap">

    <!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="page-head-text">
                        <h1 class="panel-title"><strong>Quản lý</strong> quản trị viên</h1>
                        <div class="form-group pull-right">
                            <a href="{{ route('create.role')}}">
                                <button class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span> Thêm mới Nhóm Quyền</button>
                            </a>
                            <a href="{{ route('employee.user.create') }}">
                                <button class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span> Thêm mới nhân viên</button>
                            </a>            
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
                                    <a href="{{ route('employee.show', $groupUser -> id) }}">
                                        <button class="btn btn-warning btn-rounded btn-condensed btn-sm"><span
                                            class="fa fa-info"></span></button>
                                        </a>
                                        <a href="{{ route('edit.role', $groupUser -> id) }}">
                                            <button   class="btn btn-primary btn-rounded btn-condensed btn-sm"><span
                                                class="fa fa-pencil"></span></button>
                                            </a>
                                            <a>
                                               <button class="btn btn-danger btn-rounded btn-condensed btn-sm notiDelete" data-id="{{$groupUser -> id}}"><span
                                                class="fa fa-times"></span></button>
                                            </button>
                                        </a>
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