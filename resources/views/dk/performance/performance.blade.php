@extends('dk.layout.app')

@section('title', 'Performance')

@section('h1title',"Performance")
@section('pageData')
<div class='col-lg-12' ng-controller='performanceController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">Performance <p><img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
			<div class="col-sm-3 sidenav Lsidebar">
			  <div class="well">
				<p><input type="text" ng-model="empsearch" class="form-control" placeholder="Search"/></p>
			  </div>
			  <div class="well">
				<p>ADS</p>
			  </div>
			</div>
			<div class="col-sm-9 text-left content panel panel-default">
				<div class="col-lg-10 " ng-hide="Hide">
					<h1 id="title"> My Performance </h1>
					 <div class="login_since">
						<h3>You logged in since</h3>
						<span id="startclock">
							<div id="clockdiv">
							  <div>
								<span id="hours" class="hours">@{{ hour }}</span>
								<div class="smalltext">Hours</div>
							  </div>
							  <div>
								<span id="min" class="minutes">@{{ minute }}</span>
								<div class="smalltext">Minutes</div>
							  </div>
							  <div>
								<span id="sec" class="seconds">@{{ second }}</span>
								<div class="smalltext">Seconds</div>
							  </div>
							</div>
							<br><br>
						</span>
						<input type="button" ng-click="stopday()" class="btn btn-info btn-sm" id="end_day" value="Close The Day">
					<br><br>
					</div>
					
					<div id="permission_list" ng-hide="showList">
						<h3> Permissions </h3>
						<div  class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<button type="button" class="btn btn-info btn-lg" id="apply_permiss" ng-click="app_perm()">Apply Permission</button>
						<button type="button" class="btn btn-info btn-lg" id="apply_leave" ng-click="app_leav()">Apply Leave</button>
						</div>
					</div>
				</div>
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
								<span href="#"  ng-click="maxtable()" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></span>
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
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
						</div>
						<div class="col-md-12"></div>
					</div>

					<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
						<thead>
							<tr>
								<th>ID</th>
								<th>Action</th>
								<th>Leave Type</th>
								<th>From - To</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($permissions as $permission)
								<tr ng-hide="num == {{ $permission['id'] }}">
									<td>{{$permission['id']}} </td>
									
									<td><a value="{{$permission['id']}}" ng-click="editpermission( {{$permission['id']}})" href="#">View</a></td>
									@if ($permission['leave_type']!=0)
									<td>{{$permission['leavetype']['type_name']}}</td>
									<td>{!! date('M d, Y', $permission['start']).' - '. date('M d, Y', $permission['end']) !!}</td>
									@else
									<td>{{$permission['permissiontype']['type_name']}}</td>
									<td>{!! date('M d, Y', $permission['start']).' <br> '.date('h:i A', $permission['start']).' - '. date('h:i A', $permission['end']) !!}</td>
									@endif
									
									<td>{{$permission['reason']}}</td>
									<td>{{$permission['permstatus']['status_title']}}</td>
									<td><img ng-click="performancedel({{$permission['id']}}); num={{$permission['id']}}" src="image/delete.png"></td>
								</tr>
							@endforeach
						</tbody>

					</table> 
					{!! $permissions->links() !!}
				</div>
				<form name="permission" id="employee" ng-hide="showForm" class="ng-pristine ng-valid ng-valid-required" action='apply/permission' method='post'>
					 <div class="row">
					 {{csrf_field()}}
						<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<section>
								<h4>Apply Permission</h4>
								<!--<input type='hidden' name='edit_task' value="@{{edit_task}}">-->
								<input type="hidden" name="edit_per" ng-model="edit_per" value="@{{ edit_per }}">
							</section>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label class="control-label" for="permission_date">Permission Date</label>
								<datepicker date-format="d MMMM y">
									<input ng-disabled="isDisabled"  value="" class="ng-pristine ng-untouched ng-valid ng-valid-required" name="permission_date" ng-model="permission.permission_date" type="text" required="" id="permission_date" type="text" placeholder="Select Permission Date"/>
									<span class="help-inline" ng-show="permission.permission_date.$touched && permission.permission_date.$invalid">Required</span>
									<span ng-show="permission.permission_date.$error.permission_date">Enter Valid Date.</span>
								</datepicker>
							</div>
							
							<div>
								<!--<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Start Time</label>
									<div class="input-group ">
										<input id="starttime2" name="start_time" ng-model="permission.starttime" type="time" class="form-control input-small" placeholder="Select Start Time">
									</div>
								</div>

								<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label>End Time</label>	
								<div class="input-group">
									<input id="endtime2" name="end_time" min="@{{permission.starttime}}" ng-model="permission.endtime" type="time" class="form-control input-small" placeholder="Select End Time">
									<span class="help-inline" ng-show="permission.end_time.$error.required">Please select correct time</span>
									permission.end_time.$error.required : @{{permission.end_time.$error.required}}
									permission.end_time.$error : @{{permission.end_time.$error}}
								</div>
								</div>-->
							

							<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<label>Start Time</label>
								<div class="input-group" moment-picker="permission.start" format="HH:mm A">
								<span class="input-group-addon">
									<i class="octicon octicon-clock"></i>
								</span>
								<input ng-readonly="isDisabled" class="form-control" id="start_time" name="start_time" placeholder="Select Start Time" ng-model="permission.start" ng-model-options="{ updateOn: 'blur' }">
								</div>
							</div>

							<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<label>End Time</label>
								<div class="input-group" moment-picker="permission.end" format="HH:mm A">
								<span class="input-group-addon">
									<i class="octicon octicon-clock"></i>
								</span>
								<input ng-readonly="isDisabled" class="form-control" name="end_time" placeholder="Select End Time" ng-model="permission.end" ng-model-options="{ updateOn: 'blur' }">
								</div>
							</div>

							</div>
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label for="punchout">PunchOut Type</label>
								<select ng-readonly="isDisabled" ng-model="permission.permission_type" name="permission_type" ng-options="permission.id as permission.type_name for permission in permission_types" class="form-control ng-pristine ng-untouched ng-valid"><option value="? object:16 ?"></option>
								</select>
							</div>
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label>Reason</label>
							<textarea ng-model="permission.reason" class="form-control ng-pristine ng-untouched ng-valid" placeholder="Enter The Reason" name='reason'></textarea>
							<span class="help-inline ng-hide" ng-show="permission.reason.$touched &amp;&amp; permission.reason.$invalid">Required</span>		
							</div>
							
							<div class="clearfix"></div>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group col-sm-2">
									<input class="button" ng-click="perm_save()" value="Save" type="submit">
								</div>
								<div class="form-group col-sm-2">
									<input class="button" ng-click="perm_cancel()" value="Cancel" type="button">
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
				<form name="leave" id="employee" ng-hide="showLeaveForm" class="ng-pristine ng-valid ng-valid-required" action='apply/leave' method='post'>
					 <div class="row">
						<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<section>
								<h4>Apply Leave</h4>
								<input type="hidden" name="edit_leav" ng-model="edit_leav" value="@{{ edit_leav }}">
							</section>
							{{csrf_field()}}
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label class="control-label" for="startdate">Leave Start Date</label>
								<datepicker date-format="d MMMM, y">
									<input ng-readonly="isDisabled" value="" class="ng-pristine ng-untouched ng-valid ng-valid-required" name="startdate" ng-model="leave.startdate" type="text" required=""  id="startdate" type="text" placeholder="Select Leave Start Date"/>
									<span class="help-inline" ng-show="leave.startdate.$touched && leave.startdate.$invalid">Required</span>
									<span ng-show="leave.startdate.$error.startdate">Enter Valid Date.</span>
								</datepicker>
							</div>
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label class="control-label" for="enddate">Leave End Date</label>
								<datepicker date-format="d MMMM, y">
									<input ng-readonly="isDisabled" value="" class="ng-pristine ng-untouched ng-valid ng-valid-required" name="enddate" ng-model="leave.enddate" type="text" required=""  id="enddate" type="text" placeholder="Select Leave End Date"/>
									<span class="help-inline" ng-show="leave.enddate.$touched && leave.enddate.$invalid">Required</span>
									<span ng-show="leave.enddate.$error.enddate">Enter Valid Date.</span>
								</datepicker>
							</div>

							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="leavetype">Leave Type</label>
							<select ng-readonly="isDisabled" ng-model="leave.leavetype" ng-model="leave" class="form-control ng-pristine ng-untouched ng-valid" name="leavetype" ng-options="leave.id as leave.type_name for leave in leaves">
							</select>
							</div>
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">	
							<label>Reason</label>
							<textarea ng-model="leave.reason" class="form-control ng-pristine ng-untouched ng-valid" placeholder="Enter The Reason" name='leave_reason'></textarea>
							<span class="help-inline ng-hide" ng-show="leave.reason.$touched &amp;&amp; leave.reason.$invalid">Required</span>
							</div>
							
							<div class="clearfix"></div>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group col-sm-2">
									<input class="button" ng-click="leav_save()" value="Save" type="submit">
								</div>
								<div class="form-group col-sm-2">
									<input class="button" ng-click="leav_cancel()" value="Cancel" type="button">
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					 </div>
				</form>
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
<script type="text/javascript" src="{!! asset('app/controller/dk/PerformanceController.js') !!}"></script>
@endsection