@extends('templates.public.homemaster')
@section('title')
Products with Tag: "{{ $keyword }}" - SMP Shop
@stop
@section('main-content')

<div class="banner-top">
	<div class="container">
		<h1>Products with tags: "{{ $keyword }}"</h1>
		<em></em>
		<h2>{{ $products->total() }} product(s) have this tag</h2>
	</div>
</div>	
<div class="product content">
	<div class="container">
		<div class="col-md-12">
			@if($products->total()>0)
			<div class="mid-popular">
				@foreach($products->chunk(4) as $chunk)
				<div class="row">
					@foreach($chunk as $item)
					@php
					$slug = str_slug($item->pname);
					$slugcat = str_slug($item->category->cat_name);
					$id = $item->id;
					$url =  route('public.product.detail',['slugcat'=>$slugcat,'slug'=>$slug,'id'=>$id]);
					if($item->discount>0){
						$newprice = $item->price*(100-$item->discount)/100;
						$oldprice = $item->price;
					}else{
						unset($oldprice);
						$newprice = $item->price;
					}
					@endphp
					<div class="col-md-3 item-grid1 simpleCart_shelfItem" data-id="{{ $item->id }}">
						<div class=" mid-pop">
							<div class="pro-img">
								@if($item->discount>0)
								<span class="saleicon">{{ $item->discount }}</span>
								@endif
								<a href="{{$url}}">
									<img src="/storage/app/public/{{ $item->image }}" class="img-responsive" alt=""></a>
									<div class="zoom-icon ">
										<a class="picture" href="/storage/app/public/{{ $item->image }}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
										<a href="{{$url}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
									</div>
								</div>
								<div class="mid-1">
									<div class="women">
										<div class="women-top">
											<span>{{ $item->category->cat_name }}</span>
											<h6><a href="{{$url}}">{{ $item->pname }}</a></h6>
										</div>
										<div class="img item_add">
											<a href="javascript:void(0)">
												<img src="{{$publicURL}}/images/ca.png" alt="">
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="mid-2">
										<p >@if(isset($oldprice))<label>{{ number_format($oldprice) }}</label>@endif<em class="item_price">{{ number_format($newprice) }} VNĐ</em></p>
										<div class="block">
											<div class="starbox small ghosting"> </div>
										</div>

										<div class="clearfix"></div>
									</div>

								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endforeach
					<div class="clearfix"></div>
					<div class="pagination">
						{{ $products->links() }}
					</div>
					@else
					<h2 style="color:#fff">0 result found for this tag</h2>
					@endif
				</div>
			</div>
		@stop