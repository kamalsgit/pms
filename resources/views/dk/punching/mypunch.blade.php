
@extends('dk.layout.app')

@section('title', 'Punching')

@section('h1title',"Punching")
@section('pageData')

<div class='col-lg-12' ng-controller='punchingController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">Punching </h4>
			<div class="col-sm-3 sidenav Lsidebar">
			  <div class="well">
				<p><input type="text" ng-model="prosearch" class="form-control" placeholder="Search"/></p>
			  </div>
			  <div class="well">
				<p>ADS</p>
			  </div>
			</div>

			<div class="col-sm-9 text-left content panel panel-default">
				<div class="employeelist" ng-hide="showList">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="fullscreen">
								<span href="#" ng-click="maxtable()" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div>
						<form name='userchange' action='' method='post'>
							{{csrf_field()}}
							<select name='user_id' onchange="this.form.submit()" >
								<option value="">My Self</option>
								@foreach ($users as $user)
								<option value="{{$user->emp_id}}" ng-selected="{{$user->emp_id}} =={{$user_id}}" =>{{$user->name}}</option>
								@endforeach
							</select>
					</div>
					<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
						<thead>
							<tr>
								<th>Date</th>
								<th>In Time</th>
								<th>Out Time</th>
								<th>Duration</th>
							</tr>
						</thead>
						<tbody>
						
						@forelse ($punching as $punch)
							<tr>
								<td>{{$punch['date']}}</td>
								@if ($punch['leave']==0)
								<td>{{date('h:m:s A',$punch['intime'])}}</td>
								<td>{{date('h:m:s A',$punch['outtime'])}}</td>
								<td>{{$punch['dur']}}</td>
								@else
								<td colspan=3>Leave</td>
								@endif
							</tr>
						@empty
						<tr><td colspan=4>No data found </td></tr>
						@endforelse
						</tbody>
					</table> 
					</div>
					
				  <hr>
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
<script type="text/javascript" src="{!! asset('app/controller/dk/punchingController.js') !!}"></script>

@endsection