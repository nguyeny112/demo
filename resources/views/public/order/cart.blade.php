@extends('templates.public.homemaster')
@section('main-content')


<div class="banner-top">
	<div class="container">
		<h1>Cart</h1>
		<em></em>
		<h2><a href="{{ route('public.index.index') }}">Home</a><label>/</label>Cart</h2>
	</div>
</div>
<div class="check-out content">

<div class="container">
	{{ csrf_field() }}
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive" style="overflow-y: hidden!important">
    @if(Cart::count()>0)
    	    <table class="table-heading simpleCart_shelfItem">
		  <tr>
			<th width="20%">Item</th>
					
			<th>Prices</th>
			<th width="5%">Quantity</th>
			<th>Discount</th>
			<th>Subtotal</th>
		  </tr>
		  @foreach(Cart::content() as $item)
		  @php
		  	$url = route('public.product.detail',['slugcat'=>str_slug($item->model->category->cat_name),'id'=>$item->id,'slug'=>str_slug($item->name)]);
		  	// dd($url);
		  @endphp
		  <tr class="cart-header">
			<td class="ring-in"><a href="" class="at-in"><img src="/storage/app/public/{{ $item->model->image }}" class="img-responsive" alt=""></a>
			<div class="sed">
				<h5><a href="{{ $url }}">{{ $item->name }}</a></h5>
				<p>{{ $item->model->preview }}</p>
			
			</div>
			<div class="clearfix"> </div>
			</td>
			<td class="itemprice" rawprice="{{ $item->price }}">{{ number_format($item->model->price) }} VNĐ</td>
			<td><input type="number" class="form-control border-input itemqty" rowid="{{ $item->rowId }}" value="{{ $item->qty }}"></td>
			<td>{{ $item->model->discount }} %</td>
			<td class="item_price" style="color:#fff"><span class="subtotalprice">{{ number_format($item->price*$item->qty) }}</span> VNĐ</td>
			<td class="add-check">
			<a class="item_add btn btn-success updatecart" href="javascript:void(0)"><span class="glyphicon glyphicon-refresh"></span></a>
			<a class="item_add btn btn-danger removecart" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		  </tr>
		  @endforeach
		  <tr style="border-top:2px solid #E8DAB4">
		  	<td></td>
		  	<td></td>
		  	<td></td>
		  	<td>Total: </td>
		  	<td><span class="totalprice">{{ Cart::subtotal() }}</span> VNĐ</td>
		  </tr>
	</table>

	<div class="produced">
	<a href="{{ route('public.order.step1') }}" class="btn hvr-skew-backward">Proceed To Order</a>
	 </div>
	@else
		<h2 style="color:#E8DAB4;text-align: center">You dont have any item in Cart.</h2>
		<div class="four">
		<a href="{{ route('public.index.index') }}" class="btn hvr-skew-backward">Back To Shopping</a>
		</div>	
	@endif
	</div>
	</div>
</div>
			@stop