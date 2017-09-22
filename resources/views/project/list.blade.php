
<div class='col-lg-12' ng-controller='projectController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">Projects <p><img ng-click="proadd()" src="image/add_button.png"> <img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
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
								<th ng-click="sort('project_id')">NO
									<span class="glyphicon sort-icon" ng-show="sortKey=='project_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('title')">Project Title
									<span class="glyphicon sort-icon" ng-show="sortKey=='title'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('start_date')">Start Date
									<span class="glyphicon sort-icon" ng-show="sortKey=='start_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('end_date')">End Date
									<span class="glyphicon sort-icon" ng-show="sortKey=='end_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('status_title')">Status
									<span class="glyphicon sort-icon" ng-show="sortKey=='status_title'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="">Tasks
									<span class="glyphicon sort-icon" ng-show="sortKey==''" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th colspan="2" ng-click="sort('emp_id')">Action
									<span class="glyphicon sort-icon" ng-show="sortKey=='emp_id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<!--<th ng-click="sort('business_skype')">Skype
									<span class="glyphicon sort-icon" ng-show="sortKey=='business_skype'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>-->
							</tr>
						</thead>
						<tbody dir-paginate="item in items|orderBy:sortKey:reverse|filter:prosearch|itemsPerPage:itemsperpage">
							<tr>
								<td> @{{ item.project_id }}</td>
								<td> @{{ item.title }}</td>
								<td> @{{ item.start_date }}</td>
								<td> @{{ item.end_date }}</td>
								<td> @{{ item.status_title }}</td>

								<td> <a href="/tasks/@{{ item.project_id }}" >Tasks</a></td>
								<!--ng-click="load_task(item.project_id)"-->
								<td colspan="2">
									<div id="profile" class="col-md-12">
										<div class="col-md-6">
											<img ng-click="proedit(item.project_id)" src="image/edit.png">
										</div>
										<div class="col-md-6">
											<img ng-click="prodel(item.project_id)" src="image/delete.png">
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
					
					@include('project.create')

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