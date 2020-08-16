@if (count($product) == 0)
<div style=" color: #000000;
    margin-left: 185px;
    margin-top: 20px;
    font-size: 22px;">
	Xin Lỗi. Không Tìm Thấy Bất Kỳ Sản Phẩm Nào.
</div>
@else
@foreach ($product as $key => $proAll)
<div class="col-lg-4 col-md-6">
	<div class="single-product">
		@if ($proAll -> pro_amount == 0)
		<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px;z-index: 100">Tạm Hết Hàng</span>
		@endif
		@if ( $proAll -> pro_sale > 0 && $proAll -> pro_amount > 0)
		<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white; z-index: 100">Giảm: {{$proAll -> pro_sale}}%</span>
		@endif
		<img class="img-fluid" src="{{asset("/img/product/".$proAll->categories -> name."/$proAll->pro_image")}}" alt="">
		<div class="product-details">
		<a style="overflow: hidden;
								text-overflow: ellipsis;
								line-height: 25px;
								-webkit-line-clamp: 2;
								height: 40px;
								display: -webkit-box;
								-webkit-box-orient: vertical;" href="{{ route('get.product.detail',[$proAll -> pro_slug, $proAll ->id]) }}">{{ $proAll -> pro_name}}</a>
			<div class="price">
				<h6>Giá: <span style="font-size: 20px;">{{ number_format($proAll -> pro_price, 0,',','.')}}
						VNĐ</span></h6>
				<h6 class="l-through">Sale: {{$proAll -> pro_sale}} %</h6>
			</div>
			<div class="prd-bottom">

				<a href="{{ route('add.cart', $proAll -> id) }}" class="social-info">
					<span class="ti-bag"></span>
					<p class="hover-text">Thêm vào<br> giỏ hàng</p>
				</a>
				<a href="" class="social-info">
					<span class="lnr lnr-heart"></span>
					<p class="hover-text">Thêm vào<br>yêu thích</p>
				</a>
			</div>
		</div>
	</div>
</div>
@endforeach
@endif


<!-- Start Filter Bar -->
{{-- <div class="row">
	<div class="filter-bar d-flex flex-wrap align-items-center">
		<div class="sorting mr-auto">
			<select>
				<option value="1">Show 12</option>
				<option value="1">Show 12</option>
				<option value="1">Show 12</option>
			</select>
		</div> --}}
<div class="pagination">
	{{$product->links()}}
</div>
{{-- </div>
</div>
--}}
<!-- End Filter Bar