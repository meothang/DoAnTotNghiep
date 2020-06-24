@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Báo cáo</a></li>
    <li class="active">Báo cáo theo tháng</li>
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
            <form class="form-horizontal">
                <div class="panel panel-default">
                    <?php 
                                $value = '';
                                if(!$month)
                                    $value = date("m");
                                else 
                                    $value = $month;
                            ?>
                    <div class="panel-heading">
                        <div class="page-head-text">
                            <h1 class="panel-title"><strong>Báo cáo</strong> theo tháng
                                {{ $value}}/<?php echo date("Y"); ?><br>
                                <span style="font-size: 18px;">Tổng tiền: <b>{{number_format($orders->sum('total'))  }}
                                        VNĐ
                                    </b></span>
                            </h1>
                        </div>

                    </div>
                    <div class="panel-body">

                        <form action="{{ route('admin.get.list.month-report-search')}}" method="GET" role="form">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <div class="wrapper-datepicker custom-datepicker">
                                            <div class="input-group">
                                                <select name="month" id="" class="form-control select-width" required>
                                                    <option value="">Chọn tháng</option>
                                                    <?php
                                                            for($i = 1; $i < 13; $i++) {
                                                                if($value == $i) {
                                                                      echo "<option value='$i' selected>Tháng $i</option>";
                                                                }
                                                              
                                                                else {
                                                                     echo "<option value='$i'>Tháng $i</option>";
                                                                }
                        
                                                            }
                                                        ?>
        
                                                </select>
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
                            {{-- <div class="row d-flex align-items-end">
                                <div class="col-md-4">
                                    <div class="wrapper-datepicker custom-datepicker ">
                                        <label for="datepicker">Chọn tháng:</label><br />
                                        <select name="month" id="" class="form-control select-width" required>
                                            <option value="">Chọn tháng</option>
                                            <?php
                                                    for($i = 1; $i < 13; $i++) {
                                                        if($value == $i) {
                                                              echo "<option value='$i' selected>Tháng $i</option>";
                                                        }
                                                      
                                                        else {
                                                             echo "<option value='$i'>Tháng $i</option>";
                                                        }
                
                                                    }
                                                ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 button-search-day">
                                    <button type="submit" class="btn btn-info height-35"><i class="fa fa-search"
                                            aria-hidden="true"></i>
                                        Tìm kiếm</button>
                                </div>
                            </div> --}}
                        </form>
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
                                            <td colspan="7" align="center" class="border-0">
                                                <div class="d-none" style="display:none">
                                                    BÁO CÁO BÁN HÀNG THÁNG {{$value}}/<?php  echo date("Y") ?> :
                                                </div>
                                            </td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td colspan="7" class="border-0">
                                                <div class="d-none">
                                                    Danh sách đơn hàng:
                                                </div>
                                            </td>
                                        </tr>
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
                                            <td class="text-center">1</td>
                                            <td><strong>{{ $order -> user -> name}}</strong></td>
                                            <td class="text-center">{{$order -> emailguest}}</td>
                                            <td class="text-center">{{$order -> phone}}</td>
                                            <td class="text-center">{{$order -> address}}</td>
                                            <td class="text-center">{{number_format($order -> total,0,',','.')}} VND
                                            </td>
                                            <td class="text-center">
                                                @php
                                                // hiển thị tiếng việt
                                                \Carbon\Carbon::setLocale('vi');
                                                echo
                                                \Carbon\Carbon::createFromTimeStamp(strtotime($order->updated_at))->diffForHumans();
                                                @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7" align="right" class="border-0">
                                                <div class="d-none">
                                                    Tổng đơn hàng: {{count($orders) }} đơn
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" align="right" class="border-0">
                                                <div class="d-none">
                                                    Tổng tiền: {{number_format($orders->sum('total'),0,'','.')  }} vnđ
                                                </div>
                                            </td>
                                        </tr>
                                        @else
                                        Không có đơn hàng nào !
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
            </form>
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