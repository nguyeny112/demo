@extends('templates.public.homemaster')
@section('title')
Member: {{ $user->name }} - SMP Shop
@stop
@section('main-content')
<style>
	/* USER PROFILE PAGE */
	.card {
		margin-top: 20px;
		padding: 30px;
		background-color: rgba(214, 224, 226, 0.2);
		-webkit-border-top-left-radius:5px;
		-moz-border-top-left-radius:5px;
		border-top-left-radius:5px;
		-webkit-border-top-right-radius:5px;
		-moz-border-top-right-radius:5px;
		border-top-right-radius:5px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.card.hovercard {
		position: relative;
		padding-top: 0;
		overflow: hidden;
		text-align: center;
		background-color: #fff;
		background-color: rgba(255, 255, 255, 1);
	}
	.card.hovercard .card-background {
		height: 130px;
	}
	.well{
		height:1200px;
	}
	.card-background img {
		-webkit-filter: blur(25px);
		-moz-filter: blur(25px);
		-o-filter: blur(25px);
		-ms-filter: blur(25px);
		filter: blur(25px);
		margin-left: -100px;
		margin-top: -200px;
		min-width: 130%;
	}
	.card.hovercard .useravatar {
		position: absolute;
		top: 15px;
		left: 0;
		right: 0;
	}
	.card.hovercard .useravatar img {
		width: 100px;
		height: 100px;
		max-width: 100px;
		max-height: 100px;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
		border: 5px solid rgba(255, 255, 255, 0.5);
	}
	.card.hovercard .card-info {
		position: absolute;
		bottom: 14px;
		left: 0;
		right: 0;
	}
	.card.hovercard .card-info .card-title {
		padding:0 5px;
		font-size: 20px;
		line-height: 1;
		color: #262626;
		background-color: rgba(255, 255, 255, 0.1);
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
	}
	.card.hovercard .card-info {
		overflow: hidden;
		font-size: 12px;
		line-height: 20px;
		color: #737373;
		text-overflow: ellipsis;
	}
	.card.hovercard .bottom {
		padding: 0 20px;
		margin-bottom: 17px;
	}
	.btn-pref .btn {
		-webkit-border-radius:0 !important;
	}
	.tab-content>.tab-pane{
		width:100%;
		height:auto;
		background:#fff;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		padding:20px;
		padding-bottom:50px;
		margin-bottom:20px;
	}
	.login-mail .glyphicon{
		margin-left:20px;
		color:#000;
	}
	.login-mail input{
		display: inline!important;
		background:#fff;
		color:#000!important;
		margin-top:25px;
	}
</style>
		@include('errors.popup')
<div class="content">
	<div class="col-lg-12 col-sm-12">
		<div class="card hovercard">
			<div class="card-background">
				<img class="card-bkimg" alt="" src="/storage/app/public/useravatar/{{ $user->avatar }}">
			</div>
			<div class="useravatar">
				<img alt="" src="/storage/app/public/useravatar/{{ $user->avatar }}">
			</div>
			<div class="card-info"> <span class="card-title">{{ $user->name }}</span>

			</div>
		</div>
		<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<div class="hidden-xs">User Info</div>
				</button>
			</div>
			<div class="btn-group" role="group">
				<button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
					<div class="hidden-xs">Order History</div>
				</button>
			</div>
		</div>

		<div class="well2">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tab1">
					@include('errors.warning')
					@include('errors.message')
					@include('errors.error')
					<h3>Edit Profile</h3>
					<form style="margin-top:30px" action="{{ route('public.profile.index') }}" method="POST" enctype='multipart/form-data'>
						{{ csrf_field()}}
						@if (count($errors) > 0)
						<div class="row">
							<div class="col-md-12">
								@foreach ($errors->all() as $error)
								<p class="category danger alert alert-danger">{{ $error }}</p>
								@endforeach
							</div>
						</div>
						@endif
						<div class="login-mail">
							<label>Username:</label>
							<input type="text" name="username" placeholder="Username" value="{{ $user->username }}" class="form-control border-input" disabled>
							<i  class="glyphicon glyphicon-user"></i>
						</div>
						<div class="login-mail">
							<label>Fullname:</label>
							<input type="text" name="name" placeholder="Full Name" value="{{ $user->name }}" class="form-control border-input" required="">
							<i  class="glyphicon glyphicon-user"></i>
						</div>
						<div class="login-mail">
							<label>Shipping Address:</label>
							<input type="text" name="address" placeholder="Shipping Address" value="{{ $user->address }}" class="form-control border-input" required="">
							<i  class="glyphicon glyphicon-home"></i>
						</div>
						<div class="login-mail">
							<label>Phone Number:</label>
							<input type="text" name="phone" placeholder="Phone Number" value="{{ $user->phone }}" class="form-control border-input" required="">
							<i  class="glyphicon glyphicon-phone"></i>
						</div>
						<div class="login-mail">
							<label style="display:block">Email:</label>
							<input type="email" name="email" placeholder="Email Address" value="{{ $user->email }}" class="form-control border-input" required="">
							<i  class="glyphicon glyphicon-envelope"></i>
						</div>
						<div class="login-mail">
							<label>New Password:</label>
							<input type="password" name="password" placeholder="New password" class="form-control border-input">
							<i class="glyphicon glyphicon-lock"></i>
						</div>
						<div class="login-mail">
							<label>Confirm Password:</label>
							<input type="password" name="password_confirmation" placeholder="Confirm new password" class="form-control border-input">
							<i class="glyphicon glyphicon-lock"></i>
						</div>
						<div class="login-mail">
							<label>New Avatar:</label>
							<input type="file" name="avatar" class="form-control border-input">
						</div>
						<label class="">
							<input type="submit" class="btn btn-primary" value="Save Profile">
						</label>

					</form>
				</div>
				<div class="tab-pane fade in" id="tab2">
					<h3>Your order history</h3>
					<div class="row">
						<div class="col-lg-12 col-md-12">
						@if($order->count()>0)
							<table class="table table-striped table-bordered table-hover" style="margin-top:50px">
								<thead>
									<tr>
										<th style="width:5px">#</th>
										<th>Sent Date</th>
										<th>Status</th>
										<th>Finished On</th>
										<th>Payment Method</th>
										<th>Amount</th>
										<th>Detail</th>
									</tr>
								</thead>
								<tbody>
									@php
									$i = 1;
									@endphp
									@foreach($order as $item)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $item->created_at }}</td>
										@php
										if($item->status==0){
											$status = "Pending";
										}else if($item->status==1){
											$status = "Shipping";
										}else if($item->status==2){
											$status = "Finished";
										}else{
											$status = "Rejected";
										}
										@endphp
										<td>{{ $status }}</td>
										<td>{{ ($item->status==2)?$item->updated_at:'-' }}</td>
										<td>{{ $item->payment->payment_name }}</td>
										<td>{{ number_format($item->amount) }} VNĐ</td>
										<td>
											<a onclick="window.open('{{ route('public.profile.show',['id'=>$item->id]) }}')" href="javascript:void(0)" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> View</a>
										</td>
									</tr>
									@php
									$i++;
									@endphp
									@endforeach
								</tbody>
							</table>
						@else
							<h2>You dont have any order yet.</h2>
						@endif
						</div>

					</div>
				</div>
			</div>
			<script>
				$(document).ready(function() {
					$(".btn-pref .btn").click(function () {
						$(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
						$(this).removeClass("btn-default").addClass("btn-primary");   
					});
				});
			</script>
			@stop