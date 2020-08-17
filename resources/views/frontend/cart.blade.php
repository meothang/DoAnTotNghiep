@extends('layouts.master')

@section('main')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
            <div class="col-first">
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <form method="GET" action="{{ route('update.cart') }}">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Sổ lượng</th>
                                <th scope="col">Xóa</th>
                                <th scope="col" width="200">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i=1;
                            @endphp
                            @foreach ($content as $cart_item)
                            <tr>

                                <td>
                                    <div class="media">
                                        <div class="media-body" style="font-weight:bold ">
                                            <p>{{$cart_item -> name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{asset("/img/product/".$cart_item->options-> pro_cate."/".$cart_item ->options -> avatar)}}"  width="70" height="70" alt="">
                                    <p>{{$cart_item -> avatar}}</p>
                                </td>
                                <td>
                                    <h5>{{number_format($cart_item -> options -> price_old,0, ',', '.')}} VNĐ</h5>
                                    Đã Giảm : {{$cart_item-> options -> sale}} %
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" name="qty"  min='1' {{-- data-id="{{ $cart_item->rowId }}" --}} value="{{ $cart_item -> qty}}"  class=" input-text qty">

                                        <!-- <input type="text" name="qty"  min='1' data-id="{{ $cart_item->rowId }}"  value="{{ $cart_item -> qty}}" class=" input-text qty"> -->
                                        <input type="hidden" name="id" class="pro_id{{$cart_item -> rowId}}" value="{{$cart_item -> id}}">
                                        <input type="hidden" name="rowId" class="pro_id{{$cart_item -> rowId}}" value="{{$cart_item -> rowId}}">
                                    <!-- <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div> -->
                                </td>
                                <td><a href="{{ route('delete.cart', $cart_item -> rowId) }}"  onclick="return confirm('Bạn Chắc Chắn Muốn Xóa sản Phẩm này?');"><span class="fa fa-times"></span></a></td>
                                <td>
                                    <h5>{{number_format($cart_item -> price * $cart_item -> qty,0, ',', '.')}} VNĐ</h5>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                            <tr class="bottom_button">
                                <td>
                                 <button type="submit" style="line-height: 38px;
                                 cursor: pointer;
                                 background: #e8f0f2;
                                 border: 1px solid #eeeeee;
                                 border-radius: 3px;
                                 padding: 0px 40px;
                                 display: inline-block;
                                 color: #222222;
                                 text-transform: uppercase;
                                 font-weight: 500;"> Cập Nhật Giỏ Hàng</button> 
                             </td>                    
                             <td></td>
                             <td>
                                <h5>Tổng tiền</h5>
                            </td>
                            <td colspan="2" style="text-align:center">
                                <h5 style="font-size: 18px;font-weight:bold">{{$total}} VNĐ</h5>
                            </td>
                        </tr>

                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="#">Tiếp tục mua sắm</a>
                                    <a class="primary-btn" href="{{ route('get.checkout') }}">Thanh toán</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</section>
<!--================End Cart Area =================-->
@stop
{{-- @section('script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $('.qty').blur(function(){
            let rowid = $(this).data('id');
            let proid = $(".pro_id"+rowid).val();
            $.ajax({
                url : 'cart-update/'+rowid,
                type : 'POST',
                dataType : 'json',
                data : {
                    qty : $(this).val(),
                    proid: proid,
                },
                success : function(data){
                    if(data.error){
                     alert(data.error);
                     location.reload();
                 }else{
                    alert(data.result);
                    location.reload();
                }
            }
        });
        });
    });
</script>
@stop --}}