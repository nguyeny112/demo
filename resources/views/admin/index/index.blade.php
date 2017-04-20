@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>ADMIN DASHBOARD</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.error')

<div class="row">
	<div class="col-lg-12 ">
		<div class="alert alert-info">
			<strong>Welcome {{ Auth::user()->name }} ! </strong> Have a nice day.
		</div>
		
	</div>
</div>
<!-- /. ROW  --> 
<div class="row text-center pad-top">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="ct-chart1 ct-perfect-fourth"></div>
		<label style="margin-top:25px;font-style: italic">Number of avaiable products in SMP Store</label>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<hr>
		<img class="img-responsive" style="display:block;margin:0px auto" src="{{ $adminURL }}/assets/img/logo.png" alt="">
		<hr>
		<label><a href="{{ route('admin.user.index') }}">Newest Customer: {{ App\User::orderBy('id','DESC')->first()->name }}</a></label>
		<hr>
		<label><a href="{{ route('admin.order.index') }}">Newest Order: {{ App\Order::orderBy('id','DESC')->first()->created_at }}</a></label>
		<hr>
		<label><a href="{{ route('admin.order.index') }}">Newest Comment: </a></label>
		<hr>
		@php
			$p = App\Product::orderBy('view','DESC')->first();
			$pname = $p->pname;
			$pid = $p->id;
		@endphp
		<label><a href="{{ route('admin.product.edit',['id'=>$pid]) }}">Most Viewed Product: {{ $pname }}</a></label>
		<hr>
		<a href="{{ route('admin.product.create') }}" class="btn btn-primary col-md-12"><span class="glyphicon glyphicon-plus"></span> Add a product</a>
		<hr>
	</div>
</div>
<!-- /. ROW  --> 
</div>
</div>
<script>
	var data = {
		labels: [
		@foreach($brand as $item)
		'{{ $item->brand_name }} ({{ number_format($item->product->count()/$totalProduct*100,2) }} %)',
		@endforeach
		],
		series: [
		@foreach($brand as $item)
		'{{ $item->product->count() }}',
		@endforeach
		]
	};

	var options = {
		labelInterpolationFnc: function(value) {
			return value[0];
		}
	};

	var responsiveOptions = [
	['screen and (min-width: 640px)', {
		chartPadding: 30,
		labelOffset: 100,
		labelDirection: 'explode',
		labelInterpolationFnc: function(value) {
			return value;
		}
	}],
	['screen and (min-width: 1024px)', {
		labelOffset: 87,
		chartPadding: 20
	}]
	];
	var sum = function(a, b) { return a + b };

	new Chartist.Pie('.ct-chart1', data, {labelInterpolationFnc: function(value) {
		return Math.round(value / data.series.reduce(sum) * 100) + '%';
	}}, responsiveOptions);
</script>
@stop