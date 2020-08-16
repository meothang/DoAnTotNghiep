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
                        <h1 class="panel-title"><strong>Báo cáo</strong> theo ngày:
                            <b>
                                @if(!$date)
                                <?php 
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                echo date("d/m/Y") ?>
                                @else
                                {{date('d/m/Y ', strtotime($date))}}
                                @endif
                            </b>
                            <br>
                            <span style="font-size: 18px;">Tổng tiền: <b>{{number_format($orders->sum('total'))  }}
                                    VNĐ </b></span>
                        </h1>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.get.list.day-report-search')}}" method="GET" role="form">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="wrapper-datepicker custom-datepicker">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                            <input type="text" class="form-control datepicker"
                                                placeholder="Chọn ngày cần tìm kiếm" value="" name="day" />
                                            <div class="input-group-btn button-search-day">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                    Tìm kiếm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-block" id="saveAsExcel"><span
                                            class="fa fa-plus"></span> Xuất excel báo cáo</button>
                                </div>
                            </div>
                        </form>
                    </form>
                </div>
                @if (isset($orders))
                @if (count($orders))
                {{-- <div class="d-flex justify-content-end">
                        <button class="btn btn-success height-35" id="saveAsExcel">
                            <i class="fa fa-print" aria-hidden="true"></i> Xuất excel báo cáo
                        </button>
                    </div> <br /> --}}
                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions" id="list-order-month">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">ID</th>
                                    <th width="200">Tên khách hàng</th>
                                    <th width="200" class="text-center">Email</th>
                                    <th width="120" class="text-center">Số điện thoại</th>
                                    <th width="200" class="text-center">Địa chỉ</th>
                                    <th width="200" class="text-center">Tổng Tiền Trả</th>
                                    <th width="120" class="text-center">Ngày mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr id="trow_2">
                                    <td class="text-center">#{{ $order -> id}}</td>
                                    <td><strong>{{ $order -> user -> name}}</strong></td>
                                    <td class="text-center">{{$order -> emailguest}}</td>
                                    <td class="text-center">{{$order -> phone}}</td>
                                    <td class="text-center">{{$order -> address}}</td>
                                    <td class="text-center">{{number_format($order -> total,0,',','.')}} VND</td>
                                    <td class="text-center">
                                        @php
                                        // hiển thị tiếng việt
                                        \Carbon\Carbon::setLocale('vi');
                                        echo
                                        \Carbon\Carbon::createFromTimeStamp(strtotime($order->updated_at))->diffForHumans();
                                        @endphp
                                    </td>
                                    @endforeach
                                    <tr id="trow_2">
                                    <td colspan="7" align="right">
                                        <h3 style="padding: 0px;margin: 0;">Tổng đơn hàng: <b>{{count($orders) }}
                                                đơn</b></h3>
                                    </td>
                                </tr>
                                <tr id="trow_2">
                                    <td colspan="7" align="right">
                                        <h3 style="padding: 0px;margin: 0;">Tổng tiền:
                                            <b>{{number_format($orders->sum('total'))  }} VNĐ</b>
                                        </h3>
                                    </td>
                                </tr>
                                </tr>
                                @else
                                <h4 style="text-align:center">Không có đơn hàng nào !</h4>
                                @endif()
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