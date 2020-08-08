 <div class="container nopadding-right" >
   <ul class="cart-list">
    @if (isset($products))
    @foreach ($products as  $cart_item)
    <li style="margin-top: 5px; padding-left: 20px;display:flex; padding-bottom: 10px; justify-content:center;color:#fff">
        <a class="sm-cart-product" href="{{ route('get.product.detail', [$cart_item -> pro_slug, $cart_item -> id]) }}" >
            <img  src="{{asset("/img/product/".$cart_item->categories -> name."/$cart_item->pro_image")}}" width="50px" height="50px" alt="" >
        </a>
        
        <div class="small-cart-detail" style="margin-left:10px" >
            <a style="color:#fff" class="small-cart-name" href="{{ route('get.product.detail',[$cart_item -> pro_slug, $cart_item ->id]) }}">{{$cart_item -> pro_name}}</a><br/>
            <span class="quantitys">Giá: <span><b>{{number_format($cart_item -> pro_price, 0, ',', '.')}}</b></span> VND</span>
        </div>
    </li>
    @endforeach
    @endif
  </ul>
</div>