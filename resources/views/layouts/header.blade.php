<!-- Start Header Area -->
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="#"><img src="img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="#">Trang chủ</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('get.list.product') }}">Sản phẩm</a>
						</li>
						{{-- <li class="nav-item"><a class="nav-link" href="#">Blog</a></li> --}}
						<!-- <li class="nav-item"><a class="nav-link" href="#">Blog</a></li> -->
						<li class="nav-item"><a class="nav-link" href="{{ route('get.contact') }}">Liên hệ</a></li>
						@if (Auth::user())
						<li class="nav-item"><a class="nav-link" href=""><i>Xin Chào</i> : {{ Auth::user() -> name}}</a>
							&nbsp <a href="{{ route('get.user.logout') }}"> <span class="ti-export"></span></a>
						</li>

						@else
						<li class="nav-item"><a class="nav-link" href="{{ route('get.user.login') }}">Đăng Nhập</a>
						</li>
						@endif

					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="{{ route('list.cart') }}" class="cart"><span
									class="ti-bag"></span></a></li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="search_input" id="search_input_box" style = "margin-left: -9px">
		<div class="container">
			<form action="" id="searchform" method="GET" class="d-flex justify-content-between">
				<input type="text" name="keySearch" id="keySearch" class="form-control"
					placeholder="Nhập sản phẩm cần tìm kiếm">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
			<div class="product-search restrain form-search" id="form_search"
				style="width:100%; left: 0; display: none; position: absolute;padding-top: 5px; margin-top: 5px; background-color: #3f3f3f;">
			</div>
		</div>
	</div>

</header>
<!-- End Header Area -->