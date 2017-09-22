
<div class='col-lg-12' ng-controller='taskController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">My Tasks <p><img ng-click="taskadd()" src="{{ asset('image/add_button.png')}}"> <img ng-click="sort('title')" src="{{ asset('image/sort_btn.png')}}"></p></h4>
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
					
					
				<!-- Tab section Start -->
				<div class="containers">		
				  <ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" ng-click="proj_details()" href="#details">Details</a></li>
					<li><a data-toggle="tab" href="#files">Files</a></li>
					<li><a data-toggle="tab" ng-click="individual_task()" href="#tasks">Tasks</a></li>
				  </ul>
				  <div class="tab-content">
					<div id="details" class="tab-pane fade in active">
					  <h3>Details</h3>
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					
					
		<div style="display: block;">
					<div class="form-group col-sm-12">
					  <label class="control-label col-sm-4" for="project_desc">Project:</label>
					  <div class="col-sm-8">          
						 <p class="" id="project_title">  @{{ prodetails.title }}</p>
					  </div> 
					</div>
					<div class="form-group col-sm-12">
					  <label class="control-label col-sm-4" for="project_desc">Description:</label>
					  <div class="col-sm-8">          
						 <p class="" id="project_desc">  @{{ prodetails.description }}</p>
					  </div> 
					</div>
					<div class="form-group col-sm-12">
					  <label class="control-label col-sm-4" for="start_date">Start Date</label>
					   <div class="col-sm-8">
							<p class="" id="start_date">@{{ prodetails.start_date }}</p>
						</div>
 					</div>

					<div class="form-group col-sm-12">
					  <label class="control-label col-sm-4" for="end_date">End Date</label>
						<div class="col-sm-8">
							<p class="" id="end_date">@{{ prodetails.end_date }}</p>
						</div>
					</div>

					<div class="form-group col-sm-12">
					  <label class="control-label col-sm-4" for="team_name">Team Name</label>
					  <div class="col-sm-8"> 
						  <p class="" id="team_name">@{{ prodetails.team_name }}</p>
						  <input type="hidden" id="team_id" value="8">
 					  </div>
					</div>
					<div class="form-group col-sm-12">
					  <label class="control-label col-sm-4" for="project_status">Project status</label>
					  <div class="col-sm-8">
						  <p class="" id="project_status">@{{ prodetails.status_title }}</p>
						</div>
					</div>
			</div>
					
					
					
					
					</div>
					<div id="files" class="tab-pane fade">
					  <h3>Files</h3>
					  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div id="tasks" class="tab-pane fade">
					  <h3>All Task</h3>
						<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
							<thead>
								<tr>
									<th>NO<span></span></th>
									<th ng-click="sort('title')">Name
										<span class="glyphicon sort-icon" ng-show="sortKey=='title'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th ng-click="sort('task_type')">Type
										<span class="glyphicon sort-icon" ng-show="sortKey=='task_type'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th ng-click="sort('Priority')">Priority
										<span class="glyphicon sort-icon" ng-show="sortKey=='Priority'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th ng-click="sort('assignee')">Assignee
										<span class="glyphicon sort-icon" ng-show="sortKey=='assignee'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th ng-click="sort('start_date')">From Date
										<span class="glyphicon sort-icon" ng-show="sortKey=='start_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th ng-click="sort('end_date')">To Date
										<span class="glyphicon sort-icon" ng-show="sortKey=='end_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th ng-click="sort('task_status')">Status
										<span class="glyphicon sort-icon" ng-show="sortKey=='task_status'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
									</th>
									<th colspan="2">Action<span></span>
									</th>
								</tr>
							</thead>
							<tbody dir-paginate=" item in items | orderBy:sortKey:reverse|filter:tasksearch|itemsPerPage:itemsperpage"> 
								<tr>
									
									<td> @{{ item.task_id }} </td>
									<td> @{{ item.title }} </td>
									<td> @{{ item.tasktitle }} </td>
									<td> @{{ item.prioritytitle }} </td>
									<td> @{{ item.name }} </td>
									<td> @{{ item.start_date }} </td>
									<td> @{{ item.end_date }} </td>
									<td> @{{ item.status_title }} </td>
									<td colspan="2">
										<div id="profile" class="col-md-12">
											<div class="col-md-6">
												<img ng-click="taskedit(item.task_id)" src="{{ asset('image/edit.png')}}">
											</div>
											<div class="col-md-6">
												<img ng-click="taskdel(item.task_id)" src="{{ asset('image/delete.png')}}">
											</div>
										</div>
									</td>
								</tr>

								@if(count($tasks)>0)
								<input type="text" readonly style="display:none" id="tsks" ng-init="protask='{{ $tasks }}'" ng-model="protask"/> 

								@endif
							

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
				  </div>				
				</div>		
				<!-- Tab Section End -->
					

		 </div>
					
					 @include('tasks.create')

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