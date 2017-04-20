@extends('templates.public.homemaster')
@section('title')
{{ $product->pname }} - SMP Shop
@stop
@section('main-content')

<div class="banner-top">
	<div class="container">
		<h1>{{ $product->pname }}</h1>
		{{ csrf_field() }}
		<em></em>
		<h2><a href="{{ route('public.index.index') }}">Home</a><label>/<a href="{{ route('public.product.cat',['slugcat'=>$cat_slug]) }}"></label>{{ $product->category->cat_name }}</h2></a>
	</div>
</div> 
<div class="single content">
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-6 grid">		
				<div class="flexslider">
					@if($product->discount>0)
					<span class="saleicon">{{ $product->discount }}</span>
					@endif
					{{-- {{ dd($product->imageList->count()) }} --}}
					@if($product->imageList->count()==0)
					<div class="thumb-image"> <img src="/storage/app/public/{{ $product->image }}" data-imagezoom="true" class="img-responsive"> </div>
					@else
					<ul class="slides">
						@foreach($product->imageList as $item)
						<li data-thumb="/storage/app/public/{{ $item->image_path }}">
							<div class="thumb-image"> <img src="/storage/app/public/{{ $item->image_path }}" data-imagezoom="true" class="img-responsive"> </div>
						</li> 
						@endforeach
					</ul>
					@endif
				</div>
			</div>	
			<div class="col-md-6 single-top-in">
				<div class="span_2_of_a1 simpleCart_shelfItem">
					<h3>{{ $product->pname }}</h3>
					<p class="in-para">{{ $product->desc }}</p>
					<div class="price_single">
						<span class="reducedfrom item_price">{{ number_format($product->price) }} VNĐ</span> 
						@if($product->available == 1)
						<span class="available">( Status: Available)</span>					
						@endif
						<div class="clearfix"></div>
					</div>
					<h4 class="quick">Quick Overview:</h4>
					<p class="quick_desc"> {{ $product->preview }}</p>
					<div class="quantity"> 
						<div class="quantity-select">                           
							<div class="entry value-minus">&nbsp;</div>
							<div class="entry value"><span>1</span></div>
							<div class="entry value-plus active">&nbsp;</div>
						</div>
					</div>
					<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
					</script>
					<!--quantity-->
					<div class="simpleCart_shelfItem" data-id="{{ $product->id }}">
						<a href="javascript:void(0)" class="add-to item_add hvr-skew-backward">Add to cart</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="facts">
					<p>
						<ul>
							<li><span class="glyphicon glyphicon-phone-alt"> Maintain: 0935579194 <span class="glyphicon glyphicon-envelope"></span>Support:levienthuong@gmail.com</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Discount: {{ $product->discount }} %.</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Shipping withing 2 weeks.</li>
							<li> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Support many payment methods.</li>
						</ul>
					</p>
				</div>
				<div class="tags item-content-block tags">
					<label style="color:#fff">Tags: </label>:
					@php
					$tags = collect($product->tags)->toArray();
					@endphp
					@foreach(explode(',',$tags[0]) as $tag)
					<a href="{{ route('public.index.tag',['slug'=>$tag]) }}">{{ $tag }}</a>
					@endforeach
				</div>
			</div>
			<div class="clearfix"> </div>
			<!---->
			<div class="tab-head">
				<nav class="nav-sidebar">
					<ul class="nav tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
						<li class=""><a href="#tab2" data-toggle="tab">Product Specifications </a></li> 
						<li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>  
					</ul>
				</nav>
				<div class="tab-content one">
					<div class="tab-pane active text-style" id="tab1">
						<div class="facts">
							<p >{!! $product->detail !!} </p>       
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam labore quisquam velit doloribus quidem, quis necessitatibus quibusdam. Officiis vitae dicta odio repellendus perspiciatis, aperiam quia vero amet. A, quidem illo.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus in harum commodi natus assumenda, porro id. Odio quo obcaecati voluptatum, a! Impedit ipsam accusantium nesciunt enim et, voluptatem eum animi?
							</p> 
						</div>

					</div>
					<div class="tab-pane text-style" id="tab2">

						<div class="facts">									
							<p >{{ $product->spec }}</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque adipisci placeat atque vero. Rerum explicabo nihil eum repudiandae minima sed deleniti repellat atque quas quis, esse qui, fugiat delectus dignissimos.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum totam sunt maxime libero, asperiores minima ad saepe nam, id sapiente provident, aut dignissimos fuga unde similique! Eum, dolore, repudiandae. Quisquam.</p>
							</div>	

						</div>
						<div class="tab-pane text-style" id="tab3">

							<div class="facts">
								<p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
								<ul>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
									<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
								</ul>     
							</div>	

						</div>

					</div>
					<div class="clearfix"></div>
				</div>
				<!---->	
			</div>
			<script src="{{ $publicURL }}/js/imagezoom.js"></script>

			<script defer src="{{ $publicURL }}/js/jquery.flexslider.js"></script>
			<script>
// Can also be used with $(document).ready()
$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});
</script>

{{-- <script src="{{ $publicURL }}/js/simpleCart.min.js"> </script> --}}
<div class="clearfix"></div>
@stop