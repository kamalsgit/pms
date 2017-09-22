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
					</div>
					<table class="table table-striped table-hover" ng-init='itemsperpage=5'>
						<thead>
							<tr>
								<th ng-click="sort('id')">Action
									<span class="glyphicon sort-icon" ng-show="sortKey=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('emp_id')">EmpID
									<span class="glyphicon sort-icon" ng-show="sortKey=='emp_intime'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th ng-click="sort('first_name')">EmpName
									<span class="glyphicon sort-icon" ng-show="sortKey=='emp_outtime'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th>Leave Type
									<span class="glyphicon sort-icon" ng-show="sortKey==''" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th>From - To
									<span class="glyphicon sort-icon" ng-show="sortKey==''" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th>Reason
									<span class="glyphicon sort-icon" ng-show="sortKey==''" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th>Created Date
									<span class="glyphicon sort-icon" ng-show="sortKey==''" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<th>Status
									<span class="glyphicon sort-icon" ng-show="sortKey==''" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>
								<!--<th ng-click="sort('business_skype')">Skype
									<span class="glyphicon sort-icon" ng-show="sortKey=='business_skype'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
								</th>-->
							</tr>
						</thead>
						<tbody dir-paginate="item in items|orderBy:sortKey:reverse|filter:prosearch|itemsPerPage:itemsperpage">
							<tr>
								<td> @{{ item.id }}</td>
								<td> @{{ item.emp_intime }}</td>
								<td> @{{ item.emp_outtime }}</td>
								<td> @{{ item.emp_intime }}</td>
								<td> @{{ item.emp_outtime }}</td>
								<td> @{{ item.emp_intime }}</td>
								<td> @{{ item.emp_outtime }}</td>
								<td> @{{ item.emp_intime }}</td>
								<td> @{{ item.emp_outtime }}</td>
								<td> @{{ item.emp_intime }}</td>
								<td> @{{ item.emp_outtime }}</td>
								<td colspan="2">
									<div id="profile" class="col-md-12">
										<div class="col-md-6">
											<img ng-click="proedit(item.project_id)" src="image/edit.png">
											<!--<input type="button" class="button" ng-click="empedit(item.emp_id)">-->
										</div>
										<div class="col-md-6">
											<img ng-click="prodel(item.project_id)" src="image/delete.png">
											<!--<input type="button" class="button" ng-click="empdel(item.emp_id)"/>-->
										</div>
									</div>
								</td>
							</tr>
						@if(count($approvels)>0)
							@php ($i = 1)
							@foreach($approvels as $approve)
							<tr>
								<td>{{$i}} @php ($i++)</td>
								<td>{{$approve->id}}</td>
								<td>{{$approve->emp_intime}}</td>
								<td>{{$approve->emp_outtime}}</td>
								<td colspan="2">
								<div id="profile" class="col-md-12">
								<div class="col-md-6">
								<img ng-click="" src="image/edit.png">
								<!--<input type="button" class="button" ng-click="empedit($emp->emp_id)" value='Edit'/>-->
								</div>
								<div class="col-md-6">
								<img ng-click="" src="image/delete.png">
								<!--<input type="button" class="button" ng-click="empdel($emp->emp_id)" value='x'/>-->
								</div>
								</div>
								</td>
							</tr>
							@endforeach
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
