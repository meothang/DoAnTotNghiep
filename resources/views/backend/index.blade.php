@extends('backend.layouts.backend-master')

@section('backend-main')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
  .highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
.col-lg-6.col-md-6.col-sm-6.col-xs-6:first-child {
    border-right: 2px solid #dedede;
}
h2
{
    font-style: italic;
}
tbody {
    font-size: 14px;
}
</style>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <?php
    $product = DB::table('products')->count('*');
    $orderCount = DB::table('orders')->count('*');
    $orderApproveCount = DB::table('orders')->where('status', 1)->where('receive', 0)->count('*');
    $orderPendingCount = DB::table('orders')->where('status', 0)->count('*');
    $orderFinished = DB::table('orders')->where('status', 1)->where('receive', 1)->count('*');

    $percentApprove = round(($orderApproveCount / $orderCount) * 100, 1);
    $percentPending = round(($orderPendingCount / $orderCount) * 100, 1);
    $percentFinished = round(($orderFinished / $orderCount) * 100, 1);
    $users = DB::table('users')->where('level', null)->count('*');
    $cat = DB::table('categories')->count('*');
    ?>
    <!-- START WIDGETS -->
    <div class="row">
        <div style="margin-top: 20px;">
            <div class="col-md-4">
                <!-- START WIDGET SLIDER -->
                <div class="widget widget-default widget-carousel">
                    <div class="owl-carousel" id="owl-example">
                        <div>
                            <div class="widget-title">Tổng lượt truy cập</div>
                            <div class="widget-subtitle">27/08/2015 15:23</div>
                            <div class="widget-int">3,548</div>
                        </div>
                        <div>
                            <div class="widget-title">Mới</div>
                            <div class="widget-subtitle">Khách hàng</div>
                            <div class="widget-int">1,977</div>
                        </div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET SLIDER -->
            </div>
            <div class="col-md-4">
                <a href="{{ route('get.backend.list.user')}}" style="text-decoration:none;color:white">
                    <div class="widget widget-primary widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$users}}</div>
                            <div class="widget-title">Thành viên</div>
                            <div class="widget-subtitle">Trên website</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <!-- START WIDGET CLOCK -->
                <div class="widget widget-warning widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>
                    <div class="widget-subtitle plugin-date">Loading...</div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                    <div class="widget-buttons widget-c3">
                        <div class="col">
                            <a href="#"><span class="fa fa-clock-o"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-bell"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-calendar"></span></a>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET CLOCK -->
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.get.list.product')}}" style="text-decoration:none;color:white">
                    <div class="widget widget-danger widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-laptop"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$product}}</div>
                            <div class="widget-title">Sản phẩm</div>
                            <div class="widget-subtitle">Trên website</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.get.list.category')}}" style="text-decoration:none;color:white">
                    <div class="widget widget-success widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-briefcase"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$cat}}</div>
                            <div class="widget-title">Danh mục</div>
                            <div class="widget-subtitle">Trên website</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.get.list.order')}}" style="text-decoration:none;color:white">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-shopping-cart"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$orderApproveCount}}</div>
                            <div class="widget-title">Đơn hàng</div>
                            <div class="widget-subtitle">Trên website</div>
                        </div>
                        <div class="widget-controls">
                            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- START SALES BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>Bán hàng</h3>
                            <span>Hoạt động bán hàng</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row stacked">
                            <div class="col-md-12">
                                <div class="progress-list">
                                    <div class="pull-left"><strong>Đang chờ duyệt</strong></div>
                                    <div class="pull-right">{{$percentPending}}%</div>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentPending}}%;">{{$percentPending}}%</div>
                                    </div>
                                </div>
                                <div class="progress-list">
                                    <div class="pull-left"><strong>Đơn đã duyệt</strong></div>
                                    <div class="pull-right">{{$percentApprove}}%</div>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentApprove}}%;">{{$percentApprove}}%</div>
                                    </div>
                                </div>
                                <div class="progress-list">
                                    <div class="pull-left"><strong class="text-danger">Đơn hàng đã hoàn thành</strong></div>
                                    <div class="pull-right">{{$percentFinished}}%</div>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentFinished}}%;">{{$percentFinished}}%</div>
                                    </div>
                                </div>
                            <!-- <div class="progress-list">
                                <div class="pull-left"><strong class="text-warning">Hoạt động hôm nay</strong></div>
                                <div class="pull-right">75/150</div>
                                <div class="progress progress-small progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- END SALES BLOCK -->
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12">
            <!-- START VISITORS BLOCK -->
            <div id="container"></div>
            <p class="highcharts-description text-center" style="font-size: 15px; font-weight: bold;">
               Biểu đồ thống kê doanh thu Website.
           </p>
           <!-- END VISITORS BLOCK -->
       </div>
   </div>   
</div>
<!-- END DASHBOARD CHART -->
</div>
<!-- END WIDGETS -->

<!-- END PAGE CONTENT WRAPPER -->
<div class="message-box animated fadeIn" data-sound="alert" id="notifi">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span>
                <strong>Thông báo</strong> !!!</div>
                <div class="mb-content">
                    @if(isset($message))
                    <p id="noti">{{ $message }}</p>
                    @endif
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button class="btn btn-warning btn-lg mb-control-yes">
                            <a href="{{ route('admin.get.login') }}">Đăng Nhập</a>
                        </button>
                        <button class="btn btn-default btn-lg mb-control-close">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('script')
    <script>
// Create the chart
let data = "{{$dataMoney}}";

datahtml = JSON.parse(data.replace(/&quot;/g,'"'));
Highcharts.chart('container', {
  chart: {
    type: 'column'
},
title: {
    text: 'Tổng doanh thu trong tháng <b><?php echo date("m/Y"); ?></b>'
},
accessibility: {
    announceNewData: {
      enabled: true
  }
},
xAxis: {
    type: 'category'
},
yAxis: {
    title: {
      text: 'Đơn Vị'
  }

},
legend: {
    enabled: false
},
plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:f} VND'
    }
}
},

series: [
{
    name: "Tổng",
    colorByPoint: true,
    data: datahtml,
}
]
});
</script>
@stop