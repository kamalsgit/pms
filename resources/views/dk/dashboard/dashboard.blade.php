@extends('dk.layout.app')

@section('title', 'Dashboard')

@section('h1title',"Dashboard")

@section('pageData')
	<div class='col-lg-12 my_team' ng-controller='dashboardController'>
		<div class="container-fluid text-center">
			<div class="col-sm-10 sidenav">
				<h4 class="header">@yield('h1title')</h4>				
				
				<div class="col-sm-3 sidenav Lsidebar">
				  <div class="well">
					<p><input type="text" ng-model="empsearch" class="form-control" placeholder="Search"/></p>
				  </div>
				  <div class="well">
					<p>ADS</p>
				  </div>
				</div>

				<div class="col-sm-9 text-left content panel panel-default">
					<div class="employeelist" ng-hide="showList">

						{{ $dashboard }}
						
					</div>

				</div>
			</div>
			
		<div class="col-sm-2 sidenav">
			<h4 class="header">Online</h4>
			<div class="col-sm-12 sidenav Rsidebar">
				  <div class="well">
					<p>ADS</p>
				  </div>
				  <div class="well">
					<p>ADS</p>
				  </div>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4 class="header">What's New</h4>
			<div class="col-sm-12 sidenav Rsidebar">
			
			  <div class="well">
				<p>ADS</p>
			  </div>
			  <div class="well">
				<p>ADS</p>
			  </div>
			</div>
		</div>
			
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/dk/dashboardController.js') !!}"></script>
@endsection