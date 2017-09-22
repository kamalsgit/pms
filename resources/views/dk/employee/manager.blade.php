@extends('dk.layout.app')

@section('title', 'Employees')

@section('h1title',"Employees")
@section('pageData')
	<div class='col-lg-12' ng-controller='managerEmployeeController'>
		<div class="container-fluid text-center">
			<div class="col-sm-10 sidenav">
				<h4 class="header">Employee</h4>
				
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
							<div class="col-md-12">
								@if(Session::has('message'))
									<div class="alert alert-success alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										{{Session::get('message') }}
									</div>
								@endif
								@if(Session::has('message-fail'))
									<div class="alert alert-danger alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										{{Session::get('message-fail') }}
									</div>
								@endif
							</div>
							<div class="col-md-12"></div>
						</div>
						<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
							<thead>
								<tr>
									<th>NO</th>
									<th>Name</th>
									<th>Email</th>
									<th>Skype</th>
									<th>Phone Number</th>
									<th>Team Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($employees as $emp)
									<tr>
										<td>{{ $emp['emp_id']}}</td>
										<td>{{ $emp['name']}}</td>
										<td>{{ $emp['business_email']}}</td>
										<td>{{ $emp['business_skype']}}</td>
										<td>{{ $emp['phone_number']}}</td>
										<td>
											<div id="profile" class="col-md-12">
												<div class="col-md-6">
													<img ng-click="empedit({{ $emp['emp_id']}})" src="{{ asset('image/edit.png') }}">
												</div>
											</div>
										</td>
									</tr>
								@empty
									<tr><td colspan=6>No employees</td></tr>
								@endforelse
							</tbody>
							<tfoot>
								<tr><td colspan=7> {{ $employees->links() }}</td></tr>
							</tfoot>
						</table> 
					</div>
					@include('dk.employee.assign')
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
<script>
</script>
<script type="text/javascript" src="{!! asset('app/controller/dk/managerEmployeeController.js') !!}"></script>
@endsection
