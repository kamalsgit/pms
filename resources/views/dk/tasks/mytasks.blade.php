@extends('dk.layout.app')

@section('title', 'My Tasks')
@section('h1title',"My Tasks")
@section('TDtitle','Task Details')
@section('pageData')
<div class='col-lg-12' ng-controller='myTaskController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">@yield('h1title')<p><img ng-click="taskadd()" src="{{ asset('image/add_button.png')}}"> <img ng-click="sort('title')" src="{{ asset('image/sort_btn.png')}}"></p></h4>
			<div class="col-sm-3 sidenav Lsidebar">
			  <div class="well">
				<p><input type="text" ng-model="tasksearch" class="form-control" placeholder="Search"/></p>
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
								<!--<label for='itemsperpage'> No of rows for a page
									<select ng-model='itemsperpage'>
										<option value="5" ng-selected="itemsperpage == 5">5</option>
										<option value="25" ng-selected="itemsperpage ==25">25</option>
										<option value="50" ng-selected="itemsperpage ==50">50</option>
										<option value="100" ng-selected="itemsperpage ==100">100</option>
									</select>
								</label>-->
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
					
					
				<!-- Tab section Start -->
				<div class="containers">
					<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Project</th>
								<th>Type</th>
								<th>Priority</th>
								<th>Status</th>
								<th>Created Date</th>
								<th>Action</th>
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
								  <h4 class="modal-title">@yield('TDtitle')</h4>
								</div>		
								<div class="modal-body">
								  <div class="row">
								  <div class="col-md-12">
									<div class="col-md-6"><p><b>Project Name</b></p></div><div class="col-md-6"><p>@{{ taskdetails['project']['title'] }}</p></div>
									<div class="col-md-6"><p><b>Task Name</b></p></div><div class="col-md-6"><p>@{{ taskdetails['title']}}</p></div>
									<div class="col-md-6"><p><b>Task Type</b></p></div><div class="col-md-6"><p>@{{ taskdetails['task_type_detail']['title']}}</p></div>
									<div class="col-md-6"><p><b>Priority</b></p></div><div class="col-md-6"><p>@{{ taskdetails['task_priority']['title']}}</p></div>
									<div class="col-md-6"><p><b>Assignee</b></p></div><div class="col-md-6"><p>@{{ taskdetails['task_assignee']['name']}}</p></div>
									<div class="col-md-6"><p><b>Status</b></p></div><div class="col-md-6"><p>@{{ taskdetails['task_status_details']['status_title']}}</p></div>
									<div class="col-md-6"><p><b>File Id</b></p></div><div class="col-md-6"><p>@{{ taskdetails['file_id']}}</p></div>
									<div class="col-md-6"><p><b>Start date</b></p></div><div class="col-md-6"><p>@{{ taskdetails['start_date']}}</p></div>
									<div class="col-md-6"><p><b>End Date</b></p></div><div class="col-md-6"><p>@{{ taskdetails['end_date'] }}</p></div>
									<div class="col-md-6"><p><b>Description</b></p></div><div class="col-md-6"><p>@{{ taskdetails['description']}}</p></div>
									<div class="col-md-6"><p><b>Created Date</b></p></div><div class="col-md-6"><p>@{{ taskdetails['created_at']}}</p></div>
								  </div>
								  </div>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div>


							@forelse ($tasks as $task)
								<tr>
									<td>{{ $task['task_id']}}</td>
									<td><a data-toggle="modal" ng-click="tdetails({{ $task['task_id'] }})" data-target="#myModal" href="#" >{{ $task['title']}}</a></td>
									<td>{{ $task['project']['title']}}</td>
									<td>{{ $task['task_type_detail']['title']}}</td>
									<td>{{ $task['task_priority']['title']}}</td>
									<td>{{ $task['task_status_details']['status_title']}}</td>
									<td>{{ $task['created_at']}}</td>
									<td>
									<a data-toggle="modal" ng-click="getattension({{ $task['task_id']}})" data-target="#myAttention" href="#">Send Attension</a>
										<!--<div id="profile" class="col-md-12">
											<div class="col-md-6">
												<img ng-click="empedit({{ $task['task_id']}})" src="image/edit.png">
											</div>
											<div class="col-md-6">
												<img ng-click="empdel({{ $task['task_id']}})" src="image/delete.png">
											</div>
										</div>-->
									</td>
								</tr>
							@empty
								<tr><td colspan=6>No Tasks</td></tr>
							@endforelse
						</tbody>
						<tfoot>
							<tr><td colspan=6> {{ $tasks->links() }}</td></tr>
						</tfoot>
						</table>
						
						
						
					  <!-- Modal -->
					  <div class="modal fade" id="myAttention" role="dialog">
						<div class="modal-dialog">
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">View Threads</h4>
							</div>
							<div class="modal-body">
							
							<form name="task" method="post" action="/attension/create" id="employee" ng-hide="showForm">
								{{csrf_field()}}
								<input type='hidden' name='task_id' ng-model='task_id' value="@{{ attension['task_id'] }}">
								<input type='hidden' name='lead_id' ng-model='lead_id' value="@{{ attension['task_id'] }}">
								<div class="row">
								
								<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 chatBox">
								
								<div ng-if="i.lead_id !=0" class="chatLeft" data-ng-repeat="i in chat"><p> Tl : @{{ i.attension }} </p></div>									
								
								<div ng-if="i.lead_id==0" class="chatRight" data-ng-repeat="i in chat"><p> You : @{{ i.attension }} </p></div>									
								
								
								</div>
								
								<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label ng-click="notify()">Send Attension</label>
									<div ng-show="notification">
										<div class="form-group col-sm-12">
											<textarea ng-model="attensions" class="form-control" id="attensions" name="attensions" placeholder="Enter Attension Message"></textarea>
										</div>
										<div class="clearfix"></div>
										<div class="form-group col-sm-12">
											<input type="submit" class="button" value='Send'>
										</div>
									</div>
								</div>
								
								</div>
							</form>
							
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						  </div>
						  
						</div>
					  </div>

				</div>
				<!-- Tab Section End -->
					

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
<script type="text/javascript" src="{!! asset('app/controller/dk/myTaskController.js') !!}"></script>
@endsection