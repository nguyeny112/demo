
@if($products->count()==0)
@else
<ul class="wrap-suggestion">
	@foreach($products as $product)
		@php
		$slug = str_slug($product->pname);
		$slugcat = str_slug($product->category->cat_name);
		$id = $product->id;
		$url =  route('public.product.detail',['slugcat'=>$slugcat,'slug'=>$slug,'id'=>$id]);
		if($product->discount>0){
			$newprice = $product->price*(100-$product->discount)/100;
		}else{
			$newprice = $product->price;
		}
		@endphp
			<li>
		<a href="{{ $url }}">
			<img src="/storage/app/public/{{ $product->image }}" width="100px">
			<h3>{{ $product->pname }}</h3>
			<h4>Price: <span class="price">{{ number_format($newprice) }} VNĐ</span></h4>
		</a>
	</li>
	@endforeach
</ul>

@endif