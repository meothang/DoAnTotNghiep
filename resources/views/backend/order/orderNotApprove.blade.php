@extends('backend.layouts.backend-master')
@section('backend-main')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Đơn hàng</a></li>
    <li class="active">Đơn hàng chưa duyệt</li>
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
                        <h1 class="panel-title"><strong>Quản lý</strong> Đơn hàng chưa duyệt</h1>
                        <a href="">
                            <button class="btn btn-primary btn-rounded pull-right"><span class="fa fa-check"></span> Đơn hàng đã duyệt</button>
                        </a>
                        {{-- <span class="label label-primary label-form">Quản lý đơn hàng chưa duyệt</span> --}}
                        {{-- <h1>Quản lý đơn hàng chưa duyệt</h1> --}}
                        {{-- <p class="page-head-subtitle">Some awesome subtitle goes here</p> --}}
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
                                    <th class="text-center">Chú thích</th>
                                    <th width="120" class="text-center">Trạng thái</th>
                                    <th width="120" class="text-center">Ngày Đặt</th>
                                    <th width="120" class="text-center">Hành động</th>
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
                                    <td class="text-center">{{$order -> note}}</td>
                                    <td class="text-center">
                                        @if ($order -> status == 0)
                                        <a href="{{ route('admin.get.active.order', ['status', $order -> id]) }}">
                                         <button type="button" class="btn btn-warning">
                                            Chưa Duyệt
                                        </button>
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                   @php
                    // hiển thị tiếng việt
                                   \Carbon\Carbon::setLocale('vi'); 
                                   echo \Carbon\Carbon::createFromTimeStamp(strtotime($order->updated_at))->diffForHumans();
                                   @endphp
                               </td>
                               <td class="text-center">
                                <a href="{{ route('order.detail', $order -> id) }}"><button
                                    class="btn btn-primary btn-rounded btn-condensed btn-sm"><span
                                    class="fa fa-info"></span></button></a>

                                    <a href="{{ route('admin.get.active.order', ['delete', $order -> id])}}"><button class="btn btn-danger btn-rounded btn-condensed btn-sm"
                                        onClick="delete_row('trow_2');"><span class="fa fa-times"></span></button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif


                        </tbody>
                    </table>

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
<!-- PAGE CONTENT WRAPPER 
@stop