<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css')}}" type="text/css">
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" type="text/css"> <!-- ver 3.3.7 -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/custom-style.css')}}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/angular-datepicker.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/multidrop.css')}}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/angular-moment-picker.min.css')}}" type="text/css">
		
		@yield('style')
	</head>
	<body ng-app='pmsApp'>
		<section ng-controller="navCtrl">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <!--<a class="navbar-brand" href="#"><img src="image/logo_w.png"></a>-->
				  <a class="navbar-brand" href="#"><img src="{{ asset('image/logo_w.png')}}"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="/home" ng-class="">Dashboard</a></li>
					<li class="dropdown">
					<a class="dropdown-toggle" href="/employees" ng-class="navEmployee">Employees
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Page 1-1</a></li>
					</ul>
					</li>
					
					<li><a href="/teams" ng-class="{active: activepage=='teams.html'}">Teams</a></li>
					<li class="dropdown">
					<a class="dropdown-toggle" href="/projects" >Projects <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Page 1-1</a></li>
					</ul>
					</li>
					<li><a href="/permissions" ng-class="{active: activepage=='permissions.html'}">Permissions</a></li>
					<li><a href="/performance" ng-class="{active: activepage=='performance.html'}">My Performance</a></li>
					<li><a href="/punchings" ng-class="{active: activepage=='performance.html'}">My Punching</a></li>
					<li><a href="/approvels" ng-class="{active: activepage=='performance.html'}">My Approvals</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li>
						<!--<form class="navbar-form navbar-left">
						<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-btn">
						  <button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						  </button>
						</div>
						</div>
						</form>-->
					</li>
					<li>
					<a data-toggle="control-sidebar" href="#">
					<img src="{{ asset('image/admin_photo.png')}}" class="img-circle" alt="profile" width="" height="25">
					</a>
					</li>
					<li class="profile">
						<p>
					  Name : {{Auth::user()->name}}<br/> EmpID : {{Auth::user()->emp_id}}
						</p>
					</li>

					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<div class="navbar-content">
									<div class="row">
										<div class="col-md-5">
											<img src="{{ asset('image/profile.jpg')}}" 
												alt="Alternate Text" class="img-responsive" />
											<p class="text-center small">
												<a href="#">Change Photo</a></p>
										</div>
										<div class="col-md-7">
											<p class="text-muted small"><span>Name : </span>{{Auth::user()->name}}</a>
											<p class="text-muted small">
												e-Mail : {{Auth::user()->business_email}}</p>
											<div class="divider">
											</div>
											<!--<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm active">View Profile</a>-->
											<a href="/profile" class="btn btn-primary btn-sm active">Update Profile</a>
										</div>
									</div>
								</div>
								<div class="navbar-footer">
									<div class="navbar-footer-content">
										<div class="row">
											<div class="col-md-6">
												<a href="#" class="btn btn-default btn-sm">Change Password</a>
											</div>
											<div class="col-md-6">
												<a href="/logout" class="btn btn-default btn-sm pull-right">Log Out</a>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
				  </ul>
				</div>
			  </div>
			</nav>
			<div>
				@yield('pageData')
								
			</div>
			<footer class="container-fluid text-center footer">
			  <p>CopyRight 2017</p>
			</footer>
		</section>
		
		<script type="text/javascript" src="{!! asset('app/lib/jquery.min.js') !!}"></script>
		<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5-.js"></script><![endif]-->
		<script type="text/javascript" src="{!! asset('app/lib/bootstrap.min.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/lib/bootstrap-timepicker.min.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/lib/angular.min.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/lib/dirPagination.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/lib/angular-datepicker.js') !!}"></script>
		
		<script type="text/javascript" src="{!! asset('app/lib/moment-with-locales.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/lib/angular-moment-picker.min.js') !!}"></script>
		
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular-animate.js""></script>
		<script type="text/javascript" src="{!! asset('app/lib/angular-dragdrop.js') !!}"></script>

		<script type="text/javascript" src="{!! asset('app/templates/templates.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/app.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('app/controller/navController.js') !!}"></script>
		
		
        <script type="text/javascript">
            $('#starttime').timepicker();
            $('#endtime').timepicker();
        </script>
			@yield('scripts')

	</body>
</html>