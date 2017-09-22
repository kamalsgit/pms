@extends('dk.layout.app')

@section('title', 'My Team')

@section('h1title',"My Team")

@section('pageData')
<div class='col-lg-12' ng-controller='manageTeamController'>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="container-fluid text-center">
		<div class="col-sm-12 sidenav">
			<h4 class="header">Teams <p><img ng-click="teamadd()" src="image/add_button.png"></p></h4>
			<div class="col-sm-12 text-left content panel panel-default">
				<div class="employeelist" ng-hide="showList">
					<div class="row">
						<div class="col-md-12">
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
							<script>
								
							</script>
							<div class="table_container">
								
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>NO</th>
								<th>Team Name</th>
								<th>Lead</th>
								<th>Status</th>
								<th>Total Members</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@forelse($teams as $team)
							<tr>
								<td> {{ $team['team_id']}}</td>
								<td> {{ $team['team_name'] }}</td>
								<td> {{ $team['leader'] }}</td>
								<td> </td>
								<td> </td>
								<td colspan="2">
									<div id="profile" class="col-md-12">
											<img ng-click="teamedit(item.team_id)" src="image/edit.png">
									</div>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan=6>No data found</td>
							</tr>
						@endforelse
						</tbody>
					</table> 
				</div>
				<!-- Create Team page  -->
				<form method="post" action="team/create" name="team" id="employee" ng-hide="showForm">
					<div class="row">
						<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<section>
								<h4>Create Team</h4>
							</section>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label>Team Name</label>
									{{csrf_field()}}
								<input type='hidden' name='edit_team' ng-model='edit_team' value="@{{edit_team}}">
								<input class="form-control" type="text" name="name" value="" ng-model="team.team_name" required="" placeholder="Enter Team Name"/>
								<span class="help-inline" ng-show="team.team_name.$touched && team.team_name.$invalid">Required</span>
							</div>
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label>Team Description</label>
								<textarea ng-model="team.team_description" class="form-control" name="desc"></textarea>
								<span class="help-inline" ng-show="team.team_description.$touched && team.team_description.$invalid" placeholder="Enter Team Description">Required</span>
							</div>
							<script>
							var allMemebers = [];
							</script>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label for="teamlead">Select Team Lead</label>
								<select ng-model="team.lead" ng-change="Leaderchange()" class="form-control" name="teamlead">
									@forelse($myemployees as $emp)
										<option value="{{$emp->emp_id}}">{{$emp->name}}</option>
										<script>
											allMemebers.push({'emp_id':{{$emp->emp_id}},'name':'{{$emp->name}}'});
										</script>
									@empty
										<option value="">No employee under You</option>
									@endforelse
								</select>
							</div>
							
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label for="teammembers">Select Senior Members</label>
								<div>
									<multiple-autocomplete ng-model="seniormembers" after-select-item="selectemployee" after-remove-item="removeemployee" object-property="name" suggestions-arr="allMemebers"></multiple-autocomplete>
									<input type='hidden' name='seniormembers' value="@{{seniormembers}}">
								</div>
							</div>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label for="teammembers2">Select Trainee Members</label>
								<div>
									<multiple-autocomplete ng-model="traineemembers" after-select-item="selectemployee" after-remove-item="removeemployee" object-property="name" suggestions-arr="allMemebers"></multiple-autocomplete>
									<input type='hidden' name='traineemembers' value="@{{traineemembers}}">
								</div>
							</div>
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="teamstatus">Select Team Status</label>
							<select ng-model="team.is_active" class="form-control" name="teamstatus">
								<option value="1" ng-selected="team.is_active ==1">Active</option>
								<option value="0" ng-selected="team.is_active ==0">Inactive</option>
							</select>
							</div>
							
							<div class="clearfix"></div>
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group col-sm-2">
									<input type="submit" class="button" ng-click="team_save()" value='Save'>
								</div>
								<div class="form-group col-sm-2">
									<input type="button" class="button" ng-click="team_cancel()" value='Cancel'>
								</div>
							</div>
							<div class="clearfix"></div>	
						</div>
					</div>
				</form><hr>
				<!-- Create Team page  -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

	
	<script type="text/javascript" src="{!! asset('app/controller/dk/manageTeamController.js') !!}"></script>
@endsection