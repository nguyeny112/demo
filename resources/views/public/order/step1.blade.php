@extends('templates.public.homemaster')
@section('main-content')

<div class="banner-top">
	<div class="container">
		<h1>Step 1: Shipping Address</h1>
		<em></em>
		<h2><a href="{{ route('public.index.index') }}">Home</a><label>/</label>Shipping Address</h2>
	</div>
</div>
<div class="check-out content">

	<div class="container">
		<div class="row">
			<div class="col-md-6 shipping col-sm-6 col-xs-12">
				<h3 class="text-center" style="color:#E8DAB4;margin-bottom:24px;padding-bottom:25px;border-bottom:3px solid #E8DAB4">Shipping Address</h3>
				@if (count($errors) > 0)
				<div class="row">
					<div class="col-md-12">
						@foreach ($errors->all() as $error)
						<p class="category danger alert alert-danger">{{ $error }}</p>
						@endforeach
					</div>
				</div>
				@endif
				{{-- {{ dd(Session::get('request')) }} --}}
				@php
				if(Auth::user()){
					$user = Auth::user();			
					$name = $user->name;
					$address = $user->address;
					$phone = $user->phone;
					$email = $user->email;
				}else if(Session::has('request')){
					$user = (object)Session::get('request');
					$name = $user->name;
					$address = $user->address;
					$phone = $user->phone;
					$email = $user->email;
				}else{
					$name = old('name');
					$address = old('address');
					$phone = old('phone');
					$email = old('email');
				}
				@endphp
				<div class="col-xs-6 col-sm-6 col-md-6" >
					<form action="{{ route('public.order.step1') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="name" class="form-control input-sm" placeholder="Fullname" value="{{ $name }}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="phone" class="form-control input-sm" placeholder="Phone" value="{{ $phone }}">
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="email" name="email" class="form-control input-sm" placeholder="Email id" value="{{ $email }}">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<select name="payment" class="form-control border-input">
								@foreach(App\Payment::all() as $method)
								<option value="{{ $method->id }}">{{ $method->payment_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<textarea name="detail" class="form-control" rows="5">{{ old('detail') }}</textarea>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<input type="text" class="form-control border-input" value="{{ $address }}" name="address" placeholder="Enter shipping address">
						</div>
					</div> 
					<div class="col-md-12">
						<a href="{{ route('public.order.cart') }}" class="btn hvr-skew-backward">Back to Cart</a>
						<button class="btn pull-right hvr-skew-backward" type="submit">
							Continue
						</button>
					</div>
				</div>
			</form>
			<div class="col-md-6">
				@if(Cart::count()>0)
				<table class="table-heading simpleCart_shelfItem">
					<tr>
						<th width="20%">Item</th>
						<th width="5%">Quantity</th>
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
							</div>
							<div class="clearfix"> </div>
						</td>
						<td>{{ $item->qty }}</td>
						<td class="item_price" style="color:#fff"><span class="subtotalprice">{{ number_format($item->price*$item->qty) }}</span> VNĐ</td>
					</tr>
					@endforeach
					<tr style="border-top:2px solid #E8DAB4">
						<td style="color:#fff">Total: </td>
						<td>{{ Cart::count() }}</td>
						<td><span class="totalprice">{{ Cart::subtotal() }}</span> VNĐ</td>
					</tr>
				</table>
				@else
				<h2 style="color:#E8DAB4;text-align: center">You dont have any item in Cart.</h2>
				<div class="four">
					<a href="{{ route('public.index.index') }}" class="hvr-skew-backward">Back To Shopping</a>
				</div>	
				@endif
			</div>
		</div>
		@stop