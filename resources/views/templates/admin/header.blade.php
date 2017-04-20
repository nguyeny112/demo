<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Smartphone Shop Admin</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ $publicURL }}/images/favicon.png">
  {{-- VUE --}}
  <link href="/public/css/app.css" rel="stylesheet">
  <!-- BOOTSTRAP STYLES-->

  <link href="{{ $adminURL }}/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="{{ $adminURL }}/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="{{ $adminURL }}/assets/css/custom.css" rel="stylesheet" />
  <link href="{{ $adminURL }}/assets/css/style.css" rel="stylesheet" />
  <link href="{{ $adminURL }}/assets/css/bootstrap-tokenfield.min.css" rel="stylesheet" />
  <link href="{{ $adminURL }}/assets/css/tokenfield-typeahead.min.css" rel="stylesheet" />
  <link href="{{ $adminURL }}/assets/css/chartist.min.css" rel="stylesheet" />
  <link href="{{ $adminURL }}/assets/css/datatable.css" rel="stylesheet" />

  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <script src="{{ $adminURL }}/assets/js/jquery-3.2.0.min.js"></script>
  <script src="{{ $adminURL }}/assets/js/chartist.min.js"></script>



</head>
<body>
 
 
  
  <div id="wrapper">
   <div class="navbar navbar-inverse navbar-fixed-top">
   <a href="{{ route('public.index.index') }}" target="no_blank" class="btn visitfrontend">Visit Frontend <span class="glyphicon glyphicon-log-out"></span></a>
    <div class="adjust-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.index.index') }}">
          <img src="{{ $adminURL }}/assets/img/logo.png" />
        </a>
      </div>
      <span class="logout-spn" >
        <a href="{{ route('global.auth.logout') }}" style="color:#fff;padding-bottom:5px">LOGOUT <span class="glyphicon glyphicon-log-out" style="font-size:14px"></span></a>  
      </span>
   <span class="logout-spn" >
        <a href="{{ route('admin.user.edit',['id'=>Auth::user()->id]) }}" style="color:#fff;text-transform: uppercase;"><img src="/storage/app/public/useravatar/{{ Auth::user()->avatar }}" class="useravatar" alt="">{{ Auth::user()->username }}</a>  
      </span>
    </div>
  </div>
  