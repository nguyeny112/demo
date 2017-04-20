@extends('templates.public.homemaster')
@section('main-content')

<div class="banner-top">
	<div class="container">
		<h1>404</h1>
		<em></em>
		<h2><a href="{{ route('public.index.index') }}">Home</a><label>/</label>404</h2>
	</div>
</div>
<!--login-->
<div class="content">
	<div class="container">
		<div class="four">
		{{ Route::currentRouteName() }}
		<h3>404</h3>
		<p>Sorry! Evidently the document you were looking for has either been moved or no longer exist.</p>
		<a href="{{ route('public.index.index') }}" class="hvr-skew-backward">Back To Home</a>
		</div>
	</div>
<!--//login-->

@stop
