@extends('dk.layout.app')

@section('title', 'Approvels')

@section('h1title',"Approvels")
@section('pageData')
<div class='col-lg-12' ng-controller='leaveApprovelsController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">All Approvels <p> <img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
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
							<div class="col-md-6 col-md-offset-6">
								<div class="fullscreen">
								<span href="#" ng-click="maxtable()" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></span>
								</div>			
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<!-- <th>Action</th> -->
								<th>EmpID</th>
								<th>EmpName</th>
								<th>Leave Type</th>
								<th>From - To</th>
								<th>Reason</th>
								<th>Created Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($permissions as $permission)
							<tr>
								<!-- <td> 
									<div class="col-md-6">
										<img ng-click="leaveDelete({{ $permission['id']}})" src="{{ asset('image/delete.png') }}">
									</div>
								</td> -->
								<td> {{ $permission['emp_id']}}</td>
								<td> {{ $permission->employee->name}}</td>
								<td> {{ $permission->permissiontype->type_name}}</td>
								<td> {{ date('M d, Y',$permission->start) }} <br>{{date('h:m a',$permission->start).' - '.date('h:m a',$permission->end)}}</td>
								<td> {{ $permission->reason }}</td>
								<td> {{ $permission->created_at }}</td>
								<td> {{ $permission->leavestatus->leavestatus }}</td>
							</tr>
							@empty
								<tr>
								<td colspan=8> No record found</td>
								</tr>
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
@endsection
