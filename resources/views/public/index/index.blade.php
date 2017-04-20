@extends('templates.public.homemaster')
@section('main-content')

<!--banner-->
<div class="banner-wrp container">
	<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

		<!-- Indicators -->
		<ol class="carousel-indicators">
			
			{{-- {{ dd($theme[0]) }} --}}
			@php
			$i = 0;
			@endphp
			@foreach($theme as $item)
			<li data-target="#bootstrap-touch-slider" class="{{ (($i==0)?'active':'') }}" data-slide-to="{{ $i }}"></li>
			@php
			$i++;
			@endphp
			@endforeach
		</ol>

		<!-- Wrapper For Slides -->
		<div class="carousel-inner" role="listbox">

			<!-- Third Slide -->
			@php
			$i = 0;
			@endphp
			@foreach($theme as $item)
			<div class="item {{ (($i==0)?'active':'') }}">

				<!-- Slide Background -->
				<img src="/storage/app/public/{{ $item->image_path }}" alt=""  class="slide-image"/>
				<div class="bs-slider-overlay"></div>

				<div class="container">
					<div class="row">
						<!-- Slide Text Layer -->
						<div class="slide-text slide_style_left">
							<h1 data-animation="animated zoomInRight">{{ $item->title }}</h1>
							<p data-animation="animated fadeInLeft">{{ $item->desc }}</p>
							<a href="{{ $item->link }}" target="_blank" class="btn btn-primary" data-animation="animated fadeInLeft">{{ $item->buttontext }}</a>
							{{-- <a href="#" target="_blank"  class="btn btn-default" data-animation="animated fadeInRight"><img src="/storage/app/public/images/cart.png" alt=""/></a> --}}
						</div>
					</div>
				</div>
			</div>
			@php
			$i++;
			@endphp
			@endforeach
			<!-- End of Slide -->

		</div><!-- End of Wrapper For Slides -->
		@include('errors.message')
		@include('errors.error')
		@include('errors.warning')
		@include('errors.popup')

	</div>
	<!--content-->
	@php
	$top10sale = $products->sortByDesc('discount')->slice(0,10);
	$top12hot = $products->sortByDesc('view')->slice(0,12);
				// $top12
	@endphp
	<div class="content">
		<div class="container">
			<div class="content-mid">
				<h3>Sale Products</h3>
				<label class="line"></label>
				{{ csrf_field() }}
				<div class="newest_items">
					@foreach($top10sale as $item)
					@php
					$slug = str_slug($item->pname);
					$id = $item->id;
					$slugcat = str_slug($item->category->cat_name);
					$url =  route('public.product.detail',['slugcat'=>$slugcat,'slug'=>$slug,'id'=>$id]);
					if($item->discount>0){
						$newprice = $item->price*(100-$item->discount)/100;
						$oldprice = $item->price;
					}else{
						unset($oldprice);
						$newprice = $item->price;
					}
					@endphp
					<div class="col-md-3 col-sm-6 col-xs-6 item-grid simpleCart_shelfItem" data-id="{{ $item->id }}">
						<div class=" mid-pop">
							<div class="pro-img">
								@if($item->discount>0)
								<span class="saleicon">{{ $item->discount }}</span>
								@endif								
								<a href="{{$url}}">
									<img src="/storage/app/public/{{ $item->image }}" class="img-responsive" alt=""></a>
									<div class="zoom-icon ">
										<a class="picture" href="/storage/app/public/{{ $item->image }}" rel="{{ $item->pname }}" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
										<i class="glyphicon glyphicon-menu-right icon"></i>
									</div>
								</div>
								<div class="mid-1">
									<div class="women">
										<div class="women-top">
											<span>{{ $item->category->cat_name }}</span>
											<h6><a href="{{$url}}">{{ $item->pname }}</a></h6>
										</div>
										<div class="img item_add">
											<a href="javascript:void(0)"><img src="{{$publicURL}}/images/ca.png" alt=""></a>
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
				</div>
				<div class="content-mid">
					<h3>Hot Products</h3>
					<label class="line"></label>
					<div class="mid-popular">
						@foreach($top12hot->chunk(4) as $chunk)
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
							<div class="col-md-3 item-grid simpleCart_shelfItem" data-id="{{ $item->id }}">
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
													<a href="javascript:void(0)"><img src="{{$publicURL}}/images/ca.png" alt=""></a>
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
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!--//products-->
				@stop