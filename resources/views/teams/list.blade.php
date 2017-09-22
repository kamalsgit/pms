<div class='col-lg-12' ng-controller='teamController'>
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
		<div class="col-sm-10 sidenav">
			<h4 class="header">Teams <p><img ng-click="teamadd()" src="image/add_button.png"> <img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
			<div class="col-sm-3 sidenav Lsidebar">
			  <div class="well">
				<p><input type="text" ng-model="teamsearch" class="form-control" placeholder="Search"/></p>
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
								<th ng-click="sort('emp_id')">NO
									<span class="glyphicon sort-icon" ng-show="sortKey=='emp_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('first_name')">Team Name
									<span class="glyphicon sort-icon" ng-show="sortKey=='first_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('business_email')">Lead
									<span class="glyphicon sort-icon" ng-show="sortKey=='business_email'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('role_title')">Status
									<span class="glyphicon sort-icon" ng-show="sortKey=='role_title'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('phone_number')">Total Members
									<span class="glyphicon sort-icon" ng-show="sortKey=='phone_number'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th colspan="2" ng-click="sort('emp_id')">Action
									<span class="glyphicon sort-icon" ng-show="sortKey=='emp_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<!--<th ng-click="sort('business_skype')">Skype
									<span class="glyphicon sort-icon" ng-show="sortKey=='business_skype'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>-->
							</tr>
						</thead>
						<tbody dir-paginate="item in items|orderBy:sortKey:reverse|filter:teamsearch|itemsPerPage:itemsperpage">
							<tr>
								<td> @{{ item.team_id }}</td>
								<td> @{{ item.team_name }}</td>
								<td> @{{ item.leader }}</td>
								<td> @{{ item.is_active=='1' ? "Active" : "Inactive"; }}</td>
								<td> @{{ item.members.split(',').length }}</td>
								<td colspan="2">
									<div id="profile" class="col-md-12">
										<div class="col-md-6">
											<img ng-click="teamedit(item.team_id)" src="image/edit.png">
											<!--<input type="button" class="button" ng-click="empedit(item.emp_id)">-->
										</div>
										<div class="col-md-6">
											<img ng-click="teamdel(item.team_id)" src="image/delete.png">
											<!--<input type="button" class="button" ng-click="empdel(item.emp_id)"/>-->
										</div>
									</div>
								</td>

							</tr>
						</tbody>
						<tfoot>
							<td colspan='6'>
								<dir-pagination-controls
									max-size="5"
									direction-links="true"
									boundary-links="true" >
								</dir-pagination-controls>
							</td>
						</tfoot>
					</table> 
				</div>
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
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="teamlead">Select Team Lead</label>
							<select ng-model="team.lead" class="form-control" name="teamlead" ng-options="lead.emp_id as lead.name for lead in allLeads" >
							</select>
							</div>
							
							
							<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="teammembers">Select Team Members</label>
							<div>
								<multiple-autocomplete ng-model="selectmembers" object-property="name" suggestions-arr="allMemebers"></multiple-autocomplete>
								<input type='hidden' name='selectedmembers' value="@{{selectmembers}}">
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