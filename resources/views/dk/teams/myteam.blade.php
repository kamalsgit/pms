@extends('dk.layout.app')

@section('title', 'My Team')

@section('h1title',"My Team")

@section('pageData')
	<div class='col-lg-12 my_team' ng-controller='myTeamController'>
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
						<div class="row">
							<div class="col-md-12">
								<div class="fullscreen">
									<span href="#" ng-click="maxtable()" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></span>
								</div>			
							</div>
						</div>
						<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
							<thead>
								<tr>
									<th colspan="2">Team Details </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Team Name </td>
									<td>{{$team->team_name}}</td>
								</tr>
								<tr>
									<td>Team Leader </td>
									<td>{{$team->lead_data->name}}</td>
								</tr>
								<tr>
									<td>Team Members </td>
									<td>
										<ul>
										@foreach($team->mem_data as $mem)
											<li>{{$mem->name}}</li>
										@endforeach
										</ul>
									</td>
								</tr>
							</tbody>

						</table> 
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
    <script type="text/javascript" src="{!! asset('app/controller/dk/myTeamController.js') !!}"></script>
@endsection