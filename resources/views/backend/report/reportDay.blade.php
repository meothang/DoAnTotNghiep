@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Báo cáo</a></li>
    <li class="active">Báo cáo theo ngày</li>
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
                        <h1 class="panel-title"><strong>Báo cáo</strong> theo ngày <?php echo date("d/m/Y"); ?><br>
                        <span style="font-size: 18px;">Tổng tiền: <b>{{number_format($orders->sum('total'))  }} VNĐ </b></span>
                        </h1>

                        <!-- <a href="">
                            <button class="btn btn-primary btn-rounded pull-right"><span class="fa fa-check"></span> Đơn hàng đã duyệt</button>
                        </a> -->

                    </div>
                </div>

                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">ID</th>
                                    <th width="200">Tên khách hàng</th>
                                    {{-- <th width="100">status</th>
                                    <th width="100">amount</th> --}}
                                    <th width="200" class="text-center">Email</th>
                                    <th width="120" class="text-center">Số điện thoại</th>
                                    <th width="200" class="text-center">Địa chỉ</th>
                                    <th width="200" class="text-center">Tổng Tiền Trả</th>
                                    <!-- <th class="text-center">Chú thích</th>
                                    <th width="120" class="text-center">Trạng thái</th>
                                    <th width="120" class="text-center">Đã Nhận</th> -->
                                    <th width="120" class="text-center">Ngày mua</th>
                                    <!--<th width="120" class="text-center">Hành động</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($orders))
                                @foreach ($orders as $order)
                                <tr id="trow_2">
                                    <td class="text-center">1</td>
                                    <td><strong>{{ $order -> user -> name}}</strong></td>
                                    {{-- <td><span class="label label-success">New</span></td>
                                    <td>$430.20</td> --}}
                                    <td class="text-center">{{$order -> emailguest}}</td>
                                    <td class="text-center">{{$order -> phone}}</td>
                                    <td class="text-center">{{$order -> address}}</td>
                                    <td class="text-center">{{number_format($order -> total,0,',','.')}} VND</td>
                                    <!-- <td class="text-center">{{$order -> note}}</td>
                                    <td class="text-center">
                                        @if ($order -> status == 1)
                                        <a href="javascipt:void(0)">
                                            <button type="button" class="btn btn-warning">
                                                Đã Duyệt
                                            </button>
                                        </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($order -> receive == 1)
                                        <a href="javascipt:void(0)">
                                            <button type="button" class="btn btn-info">
                                                Đã Nhận
                                            </button>
                                        </a>
                                        @else
                                        <a href="javascipt:void(0)">
                                            <button type="button" class="btn btn-warning">
                                                Chưa Nhận
                                            </button>
                                        </a>
                                        @endif
                                    </td>-->
                                    <td class="text-center">
                                        @php
                                        // hiển thị tiếng việt
                                        \Carbon\Carbon::setLocale('vi');
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($order->updated_at))->diffForHumans();
                                        @endphp
                                    </td>
                                    <!--<td class="text-center">
                                        <a href="{{ route('order.detail', $order -> id) }}"><button class="btn btn-primary btn-rounded btn-condensed btn-sm"><span class="fa fa-info"></span></button></a>

                                        <a>
                                            <button class="btn btn-danger btn-rounded btn-condensed btn-sm notiDelete" data-id="{{$order -> id}}"><span class="fa fa-times"></span></button>
                                        </a>
                                    </td> -->
                                </tr>
                                @endforeach
                                @endif


                            </tbody>
                        </table>
                        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
                            <div class="mb-container">
                                <div class="mb-middle">
                                    <div class="mb-title"><span class="fa fa-times"></span> Xác nhận
                                        <strong>Xóa Đơn Hàng</strong> ?</div>
                                    <div class="mb-content">
                                        <p>Nếu bạn muốn xóa đơn hàng này</p>
                                        <p>Hãy ấn XÓA</p>
                                    </div>
                                    <div class="mb-footer">
                                        <div class="pull-right">
                                            <button class="btn btn-warning btn-lg delOrderApp">Xóa
                                            </button>
                                            <button class="btn btn-default btn-lg mb-control-close">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MESSAGE BOX-->
                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">
                                        {{$orders->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop toolbar end -->


                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- END RESPONSIVE TABLES -->

</div>
<!-- PAGE CONTENT WRAPPER-->
@stop
@section('script')
<script>
    $(".notiDelete").click(function() {
        $("#mb-remove-row").addClass("open");
        let id = $(this).data('id');
        $('.delOrderApp').click(function() {
            $.ajax({
                url: 'backend/order/delete_app/' + id,
                data: {
                    id: id,

                },
                dataType: 'json',
                type: 'get',
                success: function($result) {
                    if ($result.success) {
                        toastr.success($result.success, 'Thông Báo', {
                            timeOut: 3000
                        });
                        location.reload();
                    } else {
                        toastr.error($result.error, 'Thông Báo', {
                            timeOut: 3000
                        });
                        // location.reload();
                    }
                }

            });

        });
    });
</script>
@stop