@extends('dk.layout.app')

@section('title', 'My Projects')
@section('h1title',"My Projects")
@section('PDtitle','Project Details')

@section('pageData')
<div class='col-lg-12' ng-controller='myProjectController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">@yield('h1title') <p><img ng-click="proadd()" src="image/add_button.png"> <img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
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
								<label for='itemsperpage'> No of rows for a page
									<select ng-model='itemsperpage'>
										<option value="5" ng-selected="itemsperpage == 5">5</option>
										<option value="25" ng-selected="itemsperpage ==25">25</option>
										<option value="50" ng-selected="itemsperpage ==50">50</option>
										<option value="100" ng-selected="itemsperpage ==100">100</option>
									</select>
								</label>
							</div>
							<div class="col-md-6">
								<div class="fullscreen">
								<span href="#" ng-click="maxtable()" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></span>
								</div>			
							</div>
						</div>
						<div class="col-md-12">
							@if(Session::has('message'))
								<div class="alert alert-success alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									{{ Session::get('message') }}
								</div>
							@endif
							@if(Session::has('message-fail'))
								<div class="alert alert-danger alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									{{ Session::get('message-fail') }}
								</div>
							@endif
						</div>
						<div class="col-md-12"></div>
					</div>
					<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
						<thead>
							<tr>
								<th>NO</th>
								<th>Project Title</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
					
						
						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">@yield('PDtitle')</h4>
								</div>		
								<div class="modal-body">
								  <div class="row">
								  <div class="col-md-12">
									<div class="col-md-6"><p><b>Project Name</b></p></div><div class="col-md-6"><p>@{{details['title'] }}</p></div>
									<div class="col-md-6"><p><b>Team Name</b></p></div><div class="col-md-6"><p>@{{details['team_name']['team_name']}}</p></div>
									<div class="col-md-6"><p><b>Start Date</b></p></div><div class="col-md-6"><p>@{{details['start_date']}}</p></div>
									<div class="col-md-6"><p><b>End Date</b></p></div><div class="col-md-6"><p>@{{details['end_date']}}</p></div>
									<div class="col-md-6"><p><b>Description</b></p></div><div class="col-md-6"><p>@{{details['description']}}</p></div>
									<div class="col-md-6"><p><b>File ID</b></p></div><div class="col-md-6"><p>@{{details['team_id']}}</p></div>
									<div class="col-md-6"><p><b>Task Type</b></p></div><div class="col-md-6"><p>@{{details['project_status']['status_title']}}</p></div>
								  </div>
								  </div>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							</div>
						   </div>
						
						
						@forelse ($projects as $project)
							<tr>
								<td> {{ $project['project_id'] }}</td>
								<td> <a data-toggle="modal" ng-click="pdetails({{ $project['project_id'] }})" data-target="#myModal" href="#" >{{ $project['title'] }}</a></td>
								<td> {{ $project['start_date'] }}</td>
								<td> {{ $project['end_date'] }}</td>
								<td> {{ $project['project_status']['status_title'] }}</td>
							</tr>
						@endforeach
						</tbody>
					</table> 
					{!! $projects->links() !!}
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
<script type="text/javascript" src="{!! asset('app/controller/dk/myProjectController.js') !!}"></script>
@endsection