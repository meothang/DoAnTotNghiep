@extends('layouts.master')

@section('main')
<div id="category">
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
				<div class="col-first">
					<h1>Tất cả sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Danh mục</div>
					<ul class="main-categories">
						<?php $productType = DB::table('product_type')->get();
						?>
						@foreach($productType as $pro_type)
						<li class="filter-list main-nav-list">
							{{-- <li class="filter-list">
								<input class="pixel-radio filter_type"  type="checkbox" id="apple" value="{{$pro_type->id}}"
							name="filter_type">
							<label for="apple">{{ucwords($pro_type -> name)}}
								<span>({{App\Models\Product::where('pro_type',$pro_type->id)->count()}})
								</span>
							</label>
						</li> --}}
						<a class="filter_type" name="filter_type"
						href="{{route('get.list.product.type',['id'=>$pro_type->id])}}">{{ucwords($pro_type -> name)}}
						<span class="number">({{App\Models\Product::where('pro_type',$pro_type->id)->count( )}})
						</span>
					</a>

				</li>
				@endforeach
			</ul>
		</div>
		<div class="sidebar-filter mt-50">
			<div class="top-filter-head">Hãng sản xuất</div>
			<div class="common-filter">
				<div class="head">Chọn hãng sản xuất</div>
				<ul>
					<?php $cats = DB::table('categories')->orderby('name', 'ASC')->get();?>
					@foreach($cats as $cat)
					<li class="filter-list"><input class="pixel-radio try" type="radio" id="brandId"
						value="{{$cat->id}}" name="color">
						{{ucwords($cat->name)}}<span>({{App\Models\Product::where('pro_cate_id',$cat->id)->count()}})</span>
					</li>
					@endforeach
				</ul>

			</div>
			<div class="common-filter  mt-50">
				<div class="head">Cpu</div>
				<form action="#">
					<ul>
						<li class="filter-list"><input class="pixel-radio" type="radio" id="i3"
							name="color"><label style="font-weight:normal;margin-left: 5px;" for="i3">
								Intel Core i3<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="i5"
									name="color"><label style="font-weight:normal;margin-left: 5px;" for="i5">
										Intel Core i5<span>(29)</span></label></li>
										<li class="filter-list"><input class="pixel-radio" type="radio" id="i7"
											name="color"><label style="font-weight:normal;margin-left: 5px;" for="i7">
												Intel Core i7<span>(29)</span></label></li>
												<li class="filter-list"><input class="pixel-radio" type="radio" id="i9"
													name="color"><label style="font-weight:normal;margin-left: 5px;" for="i9">
														Intel Core i9<span>(29)</span></label></li>
														<li class="filter-list"><input class="pixel-radio" type="radio" id="xeon"
															name="color"><label style="font-weight:normal;margin-left: 5px;"
															for="xeon"> Intel Xeon<span>(29)</span></label></li>
															<li class="filter-list"><input class="pixel-radio" type="radio" id="r3"
																name="color"><label style="font-weight:normal;margin-left: 5px;" for="r3">
																	AMD Ryzen 3<span>(29)</span></label></li>
																	<li class="filter-list"><input class="pixel-radio" type="radio" id="r5"
																		name="color"><label style="font-weight:normal;margin-left: 5px;" for="r5">
																			AMD Ryzen 5<span>(29)</span></label></li>
																			<li class="filter-list"><input class="pixel-radio" type="radio" id="r7"
																				name="color"><label style="font-weight:normal;margin-left: 5px;" for="r7">
																					AMD Ryzen 7<span>(29)</span></label></li>
																				</ul>
																			</form>
																		</div>
																		<div class="common-filter  mt-50">
																			<div class="head">Ram</div>
																			<form action="#">
																				<ul>
																					<li class="filter-list"><input class="pixel-radio ram" type="radio" id="ram" value="4gb" 
																						name="color"><label style="font-weight:normal;margin-left: 5px;" for="ram4g">
																						4GB</label></li>
																						<li class="filter-list"><input class="pixel-radio ram" type="radio" id="ram" value="8gb" 
																							name="color"><label style="font-weight:normal;margin-left: 5px;" for="ram8g">
																							8GB</label></li>
																							<li class="filter-list"><input class="pixel-radio ram" type="radio" id="ram" value="16gb" 
																								name="color"><label style="font-weight:normal;margin-left: 5px;" for="ram16gb">
																								16GB</label></li>
																								<li class="filter-list"><input class="pixel-radio ram" type="radio" id="ram" value="32gb" 
																									name="color"><label style="font-weight:normal;margin-left: 5px;" for="ram32gb">
																									32GB</label></li>
																									<li class="filter-list"><input class="pixel-radio ram" type="radio" id="ram" value="m32gb" 
																										name="color"><label style="font-weight:normal;margin-left: 5px;" for="mram32gb">
																											>32GB</label></li>
																										</form> 
																									</div>
																									<div class="common-filter  mt-50">
																										<div class="head">Ổ cứng</div>
																										<form action="#">
																											<ul>
																												<li class="filter-list"><input class="pixel-radio hard" type="radio" value="ssd" id="hard"
																													name="color"><label style="font-weight:normal;margin-left: 5px;" for="ssd"> Chỉ
																													có SSD</label></li>
																													<li class="filter-list"><input class="pixel-radio hard" type="radio" value="hdd" id="hard"
																														name="color"><label style="font-weight:normal;margin-left: 5px;" for="hdd"> Chỉ
																														có HDD</label></li>
																														<li class="filter-list"><input class="pixel-radio hard" type="radio" value="ssdhdd" id="hard"
																															name="color"><label style="font-weight:normal;margin-left: 5px;" for="ssdhdd">
																															SSD + HDD</label></li>
																														</form>
																													</div>
																													<div class="common-filter  mt-50">
																														<div class="head">VGA - Card màn hình</div>
																														<form action="#">
																															<ul>
																																<li class="filter-list"><input class="pixel-radio card" type="radio" value="nvidia" id="nvidia"
																																	name="color"><label style="font-weight:normal;margin-left: 5px;"
																																	for="vganvidia"> VGA NVIDIA</label></li>
																																	<li class="filter-list"><input class="pixel-radio card" type="radio" value="amd" id="amd"
																																		name="color"><label style="font-weight:normal;margin-left: 5px;" for="vgaamd">
																																		VGA AMD</label></li>
																																		<li class="filter-list"><input class="pixel-radio card" type="radio" value="onboard" id="onboard"
																																			name="color"><label style="font-weight:normal;margin-left: 5px;"
																																			for="vgaonboard"> VGA Onboard</label></li>
																																		</form>
																																	</div>
																																	<div class="common-filter">
																																		<div class="head">Khoảng giá</div>
																																		<div class="list-group">
																																			<div class="price-range-area">
																																				<div id="slider-range"></div>
																																				<div class="value-wrapper d-flex">
																																					<div class="price">Giá:</div>
																																					<span><input size="2" type="text" id="amount_min" name="start_price" value="15"
																																						style="border:0px; font-weight: bold; color:#15161D; width: 80px;"
																																						readonly="readonly" /> VNĐ</span>
																																						<div id="lower-value"></div>
																																						<div class="to">đến</div>
																																						<span><input size="2" type="text" id="amount_max" name="end_price" value="65"
																																							style="border:0px; font-weight: bold; color:#15161D; width: 80px"
																																							readonly="readonly" /> VNĐ</span>
																																							<div id="upper-value"></div>
																																						</div>
								{{-- <p class="pull-left">
									<input size="2" type="text" id="amount_min" name="start_price"
									value="15" style="border:0px; font-weight: bold; color:green; width: 80px;" readonly="readonly" />
								</p>
								<b class="pull-right">
									<input size="2" type="text"  id="amount_max" name="end_price" value="65"
									style="border:0px; font-weight: bold; color:green; width: 80px" readonly="readonly"/>
								</b> --}}

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<form class="tree-most" id="form-order" method="get">
					<div class="filter-bar d-flex flex-wrap align-items-center">
						<div class="sorting">
							<select name="orderby" class="filter-select">
								<option value="abc">Sắp xếp theo tên</option>
								<option value="new">Mới nhất</option>
								<option value="asc">Giá tăng dần</option>
								<option value="desc">Giá giảm dần</option>
							</select>
						</div>
					</div>
				</form>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row" id="updateDiv">
						<!-- single product -->
						@if (count($product) == 0)
						<div class="col-lg-4 col-md-6">
							Sorry, Products Not Found!
						</div>
						@else
						@foreach ($product as $key => $proAll)
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								@if ($proAll -> pro_amount == 0)
								<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px;z-index: 100">Tạm Hết Hàng</span>
								@endif
								@if  ( $proAll -> pro_sale > 0 && $proAll -> pro_amount > 0)
								<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white; z-index: 100">Giảm: {{$proAll -> pro_sale}}%</span>
								@endif
								<img class="img-fluid"
								src="{{asset("/img/product/".$proAll->categories -> name."/$proAll->pro_image")}}"
								alt="">
								<div class="product-details">
									<a style="overflow: hidden;
									text-overflow: ellipsis;
									line-height: 25px;
									-webkit-line-clamp: 2;
									height: 40px;
									display: -webkit-box;
									-webkit-box-orient: vertical;"
									href="{{ route('get.product.detail',[$proAll -> pro_slug, $proAll ->id]) }}">{{ $proAll -> pro_name}}</a>
									<div class="price">
										<h6>Giá: <span
											style="font-size: 20px;">{{ number_format($proAll -> pro_price, 0,',','.')}}
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
						{{-- phân trang --}}
						<!-- Start Filter Bar -->
						{{-- <div class="filter-bar d-flex flex-wrap align-items-center"> --}}
						{{-- <div class="sorting mr-auto">
								<select>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
									<option value="1">Show 12</option>
								</select>
							</div> --}}
						{{-- <div class="pagination">
								{{$product->links()}}
							</div> --}}
					{{-- <div class="pagination">
								<a href="">
									<i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
								<a href="#" class="active">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
								<a href="#">6</a>
								<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div> --}}
						{{-- </div> --}}
					</div>
				</section>
				<!-- End Filter Bar -->
			</div>
		</div>
		<div class="page-content-wrap">
			<div class="row">
				<div class="col-md-12">
					<ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
						<li>{{$product->links()}}</li>
					</ul>
				{{-- <ul class="pagination pagination-sm pull-right push-down-20">
					<li class="disabled"><a href="#">«</a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">»</a></li>
				</ul> --}}
			</div>
		</div>
	</div>
</div>
<!-- End Best Seller -->

</div>
</div>
</div>

<!-- Modal Quick Product View -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="container relative">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="product-quick-view">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="quick-view-carousel">
							<div class="item" style="background: url(img/organic-food/q1.jpg);">
							</div>
							<div class="item" style="background: url(img/organic-food/q1.jpg);">
							</div>
							<div class="item" style="background: url(img/organic-food/q1.jpg);">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="quick-view-content">
							<div class="top">
								<h3 class="head">Mill Oil 1000W Heater, White</h3>
								<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span
									class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern
										technology. If you are
										looking for something that can make your interior look awesome, and at the same time
										give you the pleasant
									warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span
										class="lnr lnr-arrow-right"></span></a>
									</div>
									<div class="bottom">
										<div class="color-picker d-flex align-items-center">Color:
											<span class="single-pick"></span>
											<span class="single-pick"></span>
											<span class="single-pick"></span>
											<span class="single-pick"></span>
											<span class="single-pick"></span>
										</div>
										<div class="quantity-container d-flex align-items-center mt-15">
											Quantity:
											<input type="text" class="quantity-amount ml-15" value="1" />
											<div class="arrow-btn d-inline-flex flex-column">
												<button class="increase arrow" type="button" title="Increase Quantity"><span
													class="lnr lnr-chevron-up"></span></button>
													<button class="decrease arrow" type="button" title="Decrease Quantity"><span
														class="lnr lnr-chevron-down"></span></button>
													</div>
												</div>
												<div class="d-flex mt-20">
													<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
													<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
													<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>