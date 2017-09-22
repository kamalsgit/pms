@extends('layout.login')
@section('title', 'Please login and continue')
@section('content')
@extends('layout.errors')	

<div class="login">

	<div class="logo"><img src="image/logo.png" ></div>
	<h1>LOGIN</h1>
	<p>
		@foreach ($errors->all() as $error)
			{{ $error }}
		@endforeach
	
	@if (Session::has('msg'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('msg') }}
	</div>  
	@endif
	
	</p>
	
	<!--<div class="alert alert-warning" ng-show="showErrorAlert">
		<button type="button" class="close" data-ng-click="switchBool('showErrorAlert')" >×</button>
		<strong></strong>
	</div>-->
	
	<form class="aiq awx j" name="login" role="form" method='post' action='/login'>
		{{csrf_field()}}
		<input title="Please Enter Your Email" class="email" type="email" name="email" value="" ng-model="email" required placeholder="Please enter your email">
		<span style="color:red" ng-show="login.email.$dirty && login.email.$invalid">
			<span ng-show="login.email.$error.required">Email is required.</span>
			<span ng-show="login.email.$error.email">Invalid email address.</span>
		</span>
		<p>
		<input title="Please Enter Your Password" class="password" type="password" name="password" value="" ng-model="password" required placeholder="Please enter your password">
			<span style="color:red" ng-show="login.password.$dirty && login.password.$invalid">
			<span ng-show="login.password.$error.required">Password is required.</span>
		</span>
		</p>
		<p>
		<input class="button" type='submit' name='submit' ng-submit="userlogin($event)" value='LOGIN'>
		</p>
	</form>
</div>
@endsection