<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','SMP Shop - Buying Online was never so easy')</title>
    <link href="{{ $publicURL }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{ $publicURL }}/css/style.css" rel="stylesheet" type="text/css" media="all" />  
    <link rel="shortcut icon" type="image/x-icon" href="{{ $publicURL }}/images/favicon.png">

    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="{{ $publicURL }}/css/style4.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{ $publicURL }}/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $publicURL }}/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $publicURL }}/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $publicURL }}/css/bootstrapsocial.css"/>
    <link rel="stylesheet" href="{{ $publicURL }}/css/flexslider.css" type="text/css" media="screen" />
    <!--//theme-style-->
    <script src="{{ $publicURL }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ $publicURL }}/js/smoke.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ $publicURL }}/css/smoke.css"/>
</head>
<body>
    <!--header-->
    <div class="header">
        <div class="container">
            <div class="head">
                <div class=" logo">
                    <a href="{{ route('public.index.index') }}"><img src="{{ $publicURL }}/images/logo.png" alt=""></a>  
                </div>
            </div>
        </div>
        <div class="header-top">
            <div class="container">
                <div class="col-sm-5 col-md-offset-2  header-login">
                    <ul >
                        @if (!Auth::user())
                        <li><a href="{{ route('global.auth.login') }}">Login</a></li>
                        <li><a href="{{ route('global.auth.reg') }}">Register</a></li>
                        @else
                        <li><a href="{{ route('public.profile.index') }}">Hi, {{ Auth::user()->name }}</a></li>
                        <li><a href="{{ route('global.auth.logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </div>
                
                <div class="col-sm-5 header-social">        
                    <ul >
                        <li><a href="#"><i></i></a></li>
                        <li><a href="http://facebook.com/levienthuong"><i class="ic1"></i></a></li>
                        <li><a href=""><i class="ic2"></i></a></li>
                        <li><a href="#"><i class="ic3"></i></a></li>
                        <li><a href="#"><i class="ic4"></i></a></li>
                    </ul>   
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="col-sm-9 col-md-9 col-md-offset-2 h_menu4">
                    <nav class="navbar nav_bottom" role="navigation">

                        <!-- Brand and toggle get grouped for better mobile display -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <li><a class="color" href="{{ route('public.index.index') }}">Home</a></li>
                                <li class="dropdown mega-dropdown active">
                                    <a class="color2" href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>               
                                    <div class="dropdown-menu mega-dropdown-menu">
                                        <div class="menu-top">
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <h4>Categories</h4>
                                                    <ul>
                                                        @foreach($catList as $cat)
                                                        <li><a href="{{ route('public.product.cat',['slugcat'=>str_slug($cat->cat_name)]) }}">{{ $cat->cat_name }}</a></li>
                                                        @endforeach
                                                    </ul>   
                                                </div>                          
                                            </div>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <h4>Brands</h4>
                                                    <ul>
                                                        @foreach($brandList as $brand)
                                                        <li><a href="{{ route('public.product.cat',['slugcat'=>str_slug($brand->brand_name)]) }}">{{ $brand->brand_name }}</a></li>
                                                        @endforeach
                                                    </ul>   
                                                </div>                          
                                            </div>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <h4>Find a device?</h4>

                                                    <ul>
                                                        <li><a href="{{ route('public.product.index') }}">Custom Search</a></li>
                                                    </ul>   

                                                </div>                          
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>                  
                                    </div>              
                                </li>
                                <li><a class="color4" href="{{ route('public.index.about') }}">About</a></li>
                                <li ><a class="color6" href="{{ route('public.index.contact') }}">Contact</a></li>
                                @if(Auth::user())
                                <li ><a class="color6" href="{{ route('public.profile.index') }}">Profile</a></li>
                                @endif
                            </ul>
                            <div>
                                <form class="navbar-form"  role="search" method="GET" action="{{ route('public.index.search') }}">
                                    {{ csrf_field() }}
                                    <div class="input-group searchgroup">
                                        <input type="text" class="form-control" id="searchkeyword" placeholder="Search" name="q" maxlength="20" autocomplete="off" value="{{ isset($keyword)?$keyword:'' }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                        <div class="ajaxsuggestsearch"></div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                </div>
                <div class="col-sm-1 col-md-1 search-right">
                    <div class="cart box_1">
                        <a href="{{ route('public.cart.index') }}">
                            <h3> <div class="total">
                                <span class="simpleCart_total"></span></div>
                                <img src="{{ $publicURL }}/images/ca.png" alt="" width="45px"/></h3>
                                <span class="qty">{{ Cart::count() }}</span>
                            </a>
                        </div>
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <div class="iconwrapper"><span class="dropdownicon glyphicon glyphicon-chevron-down togglenavon"></span>
                                </div>
                            </button>

                        </div> 
                        <div class="clearfix"> </div>   
                    </div>
                    <div class="clearfix"></div>
                </div>  
            </div>  
        </div>