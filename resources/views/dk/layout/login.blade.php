<!DOCTYPE html>
<html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="Dinesh">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="Author" content="Dinesh">
  <meta name="Keywords" content="PMS,Dinesh">
  <meta name="Description" content="PMS login page Authondication">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" type="text/css"> <!-- ver 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
 </head>
 <body ng-app='pmsApp'>

	<section class='container' ng-controller="loginCtrl">
		@yield('content')
	</section>
	
	<script type="text/javascript" src="{!! asset('app/lib/jquery.min.js') !!}"></script>
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5-.js"></script><![endif]-->
	<script type="text/javascript" src="{!! asset('app/lib/bootstrap.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('app/lib/angular.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('app/controller/loginController.js') !!}"></script>

 </body>
</html>
