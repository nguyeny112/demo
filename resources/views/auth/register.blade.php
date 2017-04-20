@extends('templates.public.homemaster')
@section('title')
Register - SMP Shop
@stop
@section('main-content')

<div class="banner-top">
    <div class="container">
        <h1>Register</h1>
        <em style="background-color:#B4722B"></em>
        <h2><a href="{{ route('public.index.index') }}">Home</a><label>/</label>Register</h2>
    </div>
</div>
<!--login-->
<div class="content">
<div class="container">
        <div class="login">
            <form action="{{ route('global.auth.reg') }}" method="POST" enctype='multipart/form-data'>
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
            <div class="col-md-6 login-do">
            <div class="login-mail">
                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required="">
                    <i  class="glyphicon glyphicon-user"></i>
                </div>
                <div class="login-mail">
                    <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required="">
                    <i  class="glyphicon glyphicon-user"></i>
                </div>
                <div class="login-mail">
                    <input type="text" name="address" placeholder="Shipping Address" value="{{ old('address') }}" required="">
                    <i  class="glyphicon glyphicon-home"></i>
                </div>
                <div class="login-mail">
                    <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required="">
                    <i  class="glyphicon glyphicon-phone"></i>
                </div>
                <div class="login-mail">
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required="">
                    <i  class="glyphicon glyphicon-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="password" name="password" placeholder="Password" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                 <div class="login-mail">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                <div class="login-mail">
                    <input type="file" name="avatar">
                </div>
                <label class="hvr-skew-backward">
                    <input type="submit" value="Register">
                </label>
            
            </div>
            <div class="col-md-6 login-right">
                 <h3 style="margin-bottom:30px">Have an account?</h3>
                <a href="login.html" class="hvr-skew-backward">Login now</a>

            </div>
            
            <div class="clearfix"> </div>
            </form>
        </div>

</div>


@stop