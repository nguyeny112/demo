@extends('templates.public.homemaster')
@section('title')
Contact Us- SMP Shop
@stop
@section('main-content')
@include('errors.popup')


<div class="banner-top">
	<div class="container">
		<h1>Contact</h1>
		<em></em>
		<h2><a href="{{ route('public.index.index') }}">Home</a><label>/</label>Contact</h2>
	</div>
</div>	

<div class="contact content">
	<div class="contact-form">
		<div class="container">
			<div class="col-md-6 contact-left">
				<h3>At vero eos et accusamus et iusto odio dignissimos ducimus qui </h3>
				<p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas. </p>
					

					<div class="address">
						<div class=" address-grid">
							<i class="glyphicon glyphicon-map-marker"></i>
							<div class="address1">
								<h3>Address</h3>
								<p>54 Ninh Ton,
									Da Nang City, Viet Nam</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class=" address-grid ">
								<i class="glyphicon glyphicon-phone"></i>
								<div class="address1">
									<h3>Our Phone:<h3>
										<p>+84 935 57 9194</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class=" address-grid ">
									<i class="glyphicon glyphicon-envelope"></i>
									<div class="address1">
										<h3>Email:</h3>
										<p><a href="mailto:info@example.com"> levienthuong@gmail.com</a></p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class=" address-grid ">
									<i class="glyphicon glyphicon-bell"></i>
									<div class="address1">
										<h3>Open Hours:</h3>
										<p>Monday-Friday, 7AM-5PM</p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<div class="col-md-6 contact-top">
							<h3>Want to contact me?</h3>
							@if (count($errors) > 0)
							<div class="row">
								<div class="col-md-12">
									@foreach ($errors->all() as $error)
									<p class="category danger alert alert-danger">{{ $error }}</p>
									@endforeach
								</div>
							</div>
							@endif
							@php
							if(Auth::user()){
								$user = Auth::user();
								$name = $user->name;
								$phone = $user->phone;
								$email = $user->email;
							}else{
								$name = old('name');
								$phone = old('phone');
								$email = old('email');
							}
							@endphp
							<form action="{{ route('public.index.contact') }}" method="POST">
								{{ csrf_field() }}
								<div>
									<span>Your Name </span>		
									<input type="text" name="name" value="{{ $name }}" required>						
								</div>
								<div>
									<span>Your Email </span>		
									<input type="email" name="email" value="{{ $email }}" required>						
								</div>
								<div>
									<span>Your Phone Number</span>		
									<input type="text" name="phone" value="{{ $phone }}" >	
								</div>
								<div>
									<span>Title</span>		
									<input type="text" name="title" value="{{ old('title') }}" required>	
								</div>
								<div>
									<span>Your Message</span>		
									<textarea name="detail">{{ old('detail') }}</textarea>	
								</div>
								<label class="hvr-skew-backward">
									<input type="submit" value="Send" >
								</label>
							</form>						
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				@stop