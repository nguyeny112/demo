@extends('templates.public.homemaster')
@section('title')
About Us - SMP Shop
@stop
@section('main-content')


<div class="banner-top">
	<div class="container">
		<h1>About</h1>
		<em></em>
		<h2><a href="{{ route('public.index.index') }}">Home</a><label>/</label>About</h2>
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
								<p>Lorem ipsum dolor,
									TL 19034-88974</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class=" address-grid ">
								<i class="glyphicon glyphicon-phone"></i>
								<div class="address1">
									<h3>Our Phone:<h3>
										<p>+123456789</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class=" address-grid ">
									<i class="glyphicon glyphicon-envelope"></i>
									<div class="address1">
										<h3>Email:</h3>
										<p><a href="mailto:info@example.com"> Lorem@example.com</a></p>
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
							<h3>Want to work with me?</h3>
							<form>
								<div>
									<span>Your Name </span>		
									<input type="text" value="" >						
								</div>
								<div>
									<span>Your Email </span>		
									<input type="text" value="" >						
								</div>
								<div>
									<span>Subject</span>		
									<input type="text" value="" >	
								</div>
								<div>
									<span>Your Message</span>		
									<textarea> </textarea>	
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