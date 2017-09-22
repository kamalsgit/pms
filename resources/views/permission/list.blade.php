
<div class='col-lg-12' ng-controller='permissionController'>
	<div class="container-fluid text-center">
		<div class="col-sm-10 sidenav">
			<h4 class="header">Permissions <p><img ng-click="empadd()" src="image/add_button.png"> <img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
			<div class="col-sm-3 sidenav Lsidebar">
			  <div class="well">
				<p><input type="text" ng-model="empsearch" class="form-control" placeholder="Search"/></p>
			  </div>
			  <div class="well">
				<p>ADS</p>
			  </div>
			</div>

			<div class="col-sm-9 text-left content panel panel-default">
					
			<div class="col-lg-12">
				<div class="container-fluid">
					<div class="table_list permission">
					  <div class="message" id="update_success">
							<div class="alert alert-success alert-dismissible fade in" role="alert"> 
								<strong>Updated</strong> successfully..!
							</div>
						</div>

					  <form id="permission-table" name="permission-table">
						  <table id="test" class="table table-bordered table-striped text-center">
							<thead>
							  <tr>
								<th colspan="2" class="text-center">Role
								</th>
							  <th id="role-1" role-id="1" rowspan="2" class="text-center" style="vertical-align:middle">SUPER ADMIN</th><th id="role-2" role-id="2" rowspan="2" class="text-center" style="vertical-align:middle">ADMIN</th><th id="role-3" role-id="3" rowspan="2" class="text-center" style="vertical-align:middle">BUSINESS ANALYST</th><th id="role-4" role-id="4" rowspan="2" class="text-center" style="vertical-align:middle">PROJECT MANAGER</th><th id="role-5" role-id="5" rowspan="2" class="text-center" style="vertical-align:middle">TEAM LEADER</th><th id="role-6" role-id="6" rowspan="2" class="text-center" style="vertical-align:middle">DEVELOPER</th><th id="role-7" role-id="8" rowspan="2" class="text-center" style="vertical-align:middle">Designer</th><th id="role-8" role-id="9" rowspan="2" class="text-center" style="vertical-align:middle">Manager</th><th id="role-9" role-id="14" rowspan="2" class="text-center" style="vertical-align:middle">CEO</th></tr>
							  <tr><th>Module</th><th>Action</th></tr>	
							</thead>
							<tbody id="tbody">
							<tr><td class="module_name" id="same-2" rowspan="4">Employee</td><td>view</td><td class="val-1-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][18]" id="val-1-18" value="1"></td><td class="val-2-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][18]" id="val-2-18" value="1"></td><td class="val-3-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][18]" id="val-3-18" value="1"></td><td class="val-4-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][18]" id="val-4-18" value="1"></td><td class="val-5-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][18]" id="val-5-18" value="1"></td><td class="val-6-18" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][18]" id="val-6-18" value="0"></td><td class="val-7-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][18]" id="val-7-18" value="1"></td><td class="val-8-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][18]" id="val-8-18" value="1"></td><td class="val-9-18" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][18]" id="val-9-18" value="1"></td></tr><tr><td>add</td><td class="val-1-1" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][1]" id="val-1-1" value="1"></td><td class="val-2-1" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][1]" id="val-2-1" value="1"></td><td class="val-3-1" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][1]" id="val-3-1" value="1"></td><td class="val-4-1" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][1]" id="val-4-1" value="1"></td><td class="val-5-1" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][1]" id="val-5-1" value="0"></td><td class="val-6-1" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][1]" id="val-6-1" value="0"></td><td class="val-7-1" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][1]" id="val-7-1" value="0"></td><td class="val-8-1" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][1]" id="val-8-1" value="0"></td><td class="val-9-1" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][1]" id="val-9-1" value="0"></td></tr><tr><td>delete</td><td class="val-1-4" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][4]" id="val-1-4" value="1"></td><td class="val-2-4" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][4]" id="val-2-4" value="1"></td><td class="val-3-4" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][4]" id="val-3-4" value="0"></td><td class="val-4-4" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][4]" id="val-4-4" value="1"></td><td class="val-5-4" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][4]" id="val-5-4" value="0"></td><td class="val-6-4" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][4]" id="val-6-4" value="0"></td><td class="val-7-4" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][4]" id="val-7-4" value="0"></td><td class="val-8-4" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][4]" id="val-8-4" value="0"></td><td class="val-9-4" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][4]" id="val-9-4" value="0"></td></tr><tr><td>edit</td><td class="val-1-2" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][2]" id="val-1-2" value="1"></td><td class="val-2-2" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][2]" id="val-2-2" value="1"></td><td class="val-3-2" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][2]" id="val-3-2" value="0"></td><td class="val-4-2" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][2]" id="val-4-2" value="1"></td><td class="val-5-2" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][2]" id="val-5-2" value="0"></td><td class="val-6-2" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][2]" id="val-6-2" value="0"></td><td class="val-7-2" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][2]" id="val-7-2" value="0"></td><td class="val-8-2" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][2]" id="val-8-2" value="0"></td><td class="val-9-2" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][2]" id="val-9-2" value="0"></td></tr><tr><td class="module_name" id="same-3" rowspan="1">Permission</td><td>edit</td><td class="val-1-17" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][17]" id="val-1-17" value="1"></td><td class="val-2-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][17]" id="val-2-17" value="0"></td><td class="val-3-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][17]" id="val-3-17" value="0"></td><td class="val-4-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][17]" id="val-4-17" value="0"></td><td class="val-5-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][17]" id="val-5-17" value="0"></td><td class="val-6-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][17]" id="val-6-17" value="0"></td><td class="val-7-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][17]" id="val-7-17" value="0"></td><td class="val-8-17" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][17]" id="val-8-17" value="0"></td><td class="val-9-17" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][17]" id="val-9-17" value="1"></td></tr><tr><td class="module_name" id="same-4" rowspan="4">Project</td><td>delete</td><td class="val-1-8" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][8]" id="val-1-8" value="1"></td><td class="val-2-8" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][8]" id="val-2-8" value="1"></td><td class="val-3-8" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][8]" id="val-3-8" value="0"></td><td class="val-4-8" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][8]" id="val-4-8" value="0"></td><td class="val-5-8" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][8]" id="val-5-8" value="1"></td><td class="val-6-8" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][8]" id="val-6-8" value="0"></td><td class="val-7-8" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][8]" id="val-7-8" value="0"></td><td class="val-8-8" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][8]" id="val-8-8" value="1"></td><td class="val-9-8" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][8]" id="val-9-8" value="0"></td></tr><tr><td>edit</td><td class="val-1-6" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][6]" id="val-1-6" value="1"></td><td class="val-2-6" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][6]" id="val-2-6" value="1"></td><td class="val-3-6" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][6]" id="val-3-6" value="0"></td><td class="val-4-6" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][6]" id="val-4-6" value="1"></td><td class="val-5-6" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][6]" id="val-5-6" value="0"></td><td class="val-6-6" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][6]" id="val-6-6" value="0"></td><td class="val-7-6" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][6]" id="val-7-6" value="0"></td><td class="val-8-6" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][6]" id="val-8-6" value="1"></td><td class="val-9-6" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][6]" id="val-9-6" value="0"></td></tr><tr><td>view</td><td class="val-1-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][7]" id="val-1-7" value="1"></td><td class="val-2-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][7]" id="val-2-7" value="1"></td><td class="val-3-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][7]" id="val-3-7" value="1"></td><td class="val-4-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][7]" id="val-4-7" value="1"></td><td class="val-5-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][7]" id="val-5-7" value="1"></td><td class="val-6-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][7]" id="val-6-7" value="1"></td><td class="val-7-7" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][7]" id="val-7-7" value="0"></td><td class="val-8-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][7]" id="val-8-7" value="1"></td><td class="val-9-7" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][7]" id="val-9-7" value="1"></td></tr><tr><td>add</td><td class="val-1-5" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][5]" id="val-1-5" value="1"></td><td class="val-2-5" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][5]" id="val-2-5" value="1"></td><td class="val-3-5" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][5]" id="val-3-5" value="0"></td><td class="val-4-5" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][5]" id="val-4-5" value="1"></td><td class="val-5-5" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][5]" id="val-5-5" value="0"></td><td class="val-6-5" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][5]" id="val-6-5" value="0"></td><td class="val-7-5" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][5]" id="val-7-5" value="0"></td><td class="val-8-5" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][5]" id="val-8-5" value="1"></td><td class="val-9-5" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][5]" id="val-9-5" value="0"></td></tr><tr><td class="module_name" id="same-5" rowspan="4">Task</td><td>delete</td><td class="val-1-12" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][12]" id="val-1-12" value="1"></td><td class="val-2-12" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][12]" id="val-2-12" value="1"></td><td class="val-3-12" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][12]" id="val-3-12" value="0"></td><td class="val-4-12" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][12]" id="val-4-12" value="0"></td><td class="val-5-12" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][12]" id="val-5-12" value="1"></td><td class="val-6-12" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][12]" id="val-6-12" value="0"></td><td class="val-7-12" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][12]" id="val-7-12" value="0"></td><td class="val-8-12" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][12]" id="val-8-12" value="1"></td><td class="val-9-12" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][12]" id="val-9-12" value="0"></td></tr><tr><td>edit</td><td class="val-1-10" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][10]" id="val-1-10" value="1"></td><td class="val-2-10" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][10]" id="val-2-10" value="1"></td><td class="val-3-10" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][10]" id="val-3-10" value="0"></td><td class="val-4-10" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][10]" id="val-4-10" value="0"></td><td class="val-5-10" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][10]" id="val-5-10" value="1"></td><td class="val-6-10" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][10]" id="val-6-10" value="1"></td><td class="val-7-10" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][10]" id="val-7-10" value="1"></td><td class="val-8-10" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][10]" id="val-8-10" value="1"></td><td class="val-9-10" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][10]" id="val-9-10" value="0"></td></tr><tr><td>view</td><td class="val-1-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][11]" id="val-1-11" value="1"></td><td class="val-2-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][11]" id="val-2-11" value="1"></td><td class="val-3-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][11]" id="val-3-11" value="1"></td><td class="val-4-11" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][11]" id="val-4-11" value="0"></td><td class="val-5-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][11]" id="val-5-11" value="1"></td><td class="val-6-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][11]" id="val-6-11" value="1"></td><td class="val-7-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][11]" id="val-7-11" value="1"></td><td class="val-8-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][11]" id="val-8-11" value="1"></td><td class="val-9-11" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][11]" id="val-9-11" value="1"></td></tr><tr><td>add</td><td class="val-1-9" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][9]" id="val-1-9" value="1"></td><td class="val-2-9" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][9]" id="val-2-9" value="1"></td><td class="val-3-9" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][9]" id="val-3-9" value="0"></td><td class="val-4-9" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][9]" id="val-4-9" value="0"></td><td class="val-5-9" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][9]" id="val-5-9" value="1"></td><td class="val-6-9" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][9]" id="val-6-9" value="0"></td><td class="val-7-9" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][9]" id="val-7-9" value="0"></td><td class="val-8-9" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][9]" id="val-8-9" value="1"></td><td class="val-9-9" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][9]" id="val-9-9" value="0"></td></tr><tr><td class="module_name" id="same-6" rowspan="4">Team</td><td>delete</td><td class="val-1-16" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][16]" id="val-1-16" value="1"></td><td class="val-2-16" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][16]" id="val-2-16" value="1"></td><td class="val-3-16" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][16]" id="val-3-16" value="0"></td><td class="val-4-16" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][16]" id="val-4-16" value="1"></td><td class="val-5-16" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][16]" id="val-5-16" value="0"></td><td class="val-6-16" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][16]" id="val-6-16" value="0"></td><td class="val-7-16" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][16]" id="val-7-16" value="0"></td><td class="val-8-16" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][16]" id="val-8-16" value="1"></td><td class="val-9-16" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][16]" id="val-9-16" value="0"></td></tr><tr><td>view</td><td class="val-1-15" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][15]" id="val-1-15" value="1"></td><td class="val-2-15" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][15]" id="val-2-15" value="1"></td><td class="val-3-15" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][15]" id="val-3-15" value="1"></td><td class="val-4-15" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][15]" id="val-4-15" value="1"></td><td class="val-5-15" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][15]" id="val-5-15" value="0"></td><td class="val-6-15" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][15]" id="val-6-15" value="0"></td><td class="val-7-15" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][15]" id="val-7-15" value="0"></td><td class="val-8-15" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][15]" id="val-8-15" value="1"></td><td class="val-9-15" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][15]" id="val-9-15" value="1"></td></tr><tr><td>edit</td><td class="val-1-14" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][14]" id="val-1-14" value="1"></td><td class="val-2-14" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][14]" id="val-2-14" value="1"></td><td class="val-3-14" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][14]" id="val-3-14" value="0"></td><td class="val-4-14" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][14]" id="val-4-14" value="1"></td><td class="val-5-14" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][14]" id="val-5-14" value="0"></td><td class="val-6-14" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][14]" id="val-6-14" value="0"></td><td class="val-7-14" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][14]" id="val-7-14" value="0"></td><td class="val-8-14" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][14]" id="val-8-14" value="1"></td><td class="val-9-14" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][14]" id="val-9-14" value="0"></td></tr><tr><td>add</td><td class="val-1-13" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="1" name="checkbox[1][13]" id="val-1-13" value="1"></td><td class="val-2-13" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="2" name="checkbox[2][13]" id="val-2-13" value="1"></td><td class="val-3-13" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="3" name="checkbox[3][13]" id="val-3-13" value="0"></td><td class="val-4-13" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="4" name="checkbox[4][13]" id="val-4-13" value="1"></td><td class="val-5-13" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="5" name="checkbox[5][13]" id="val-5-13" value="0"></td><td class="val-6-13" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="6" name="checkbox[6][13]" id="val-6-13" value="0"></td><td class="val-7-13" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="8" name="checkbox[8][13]" id="val-7-13" value="0"></td><td class="val-8-13" onclick="check(this);"><img src="{!! asset('image/no.png') !!}" alt="tick"><input type="hidden" role-id="9" name="checkbox[9][13]" id="val-8-13" value="0"></td><td class="val-9-13" onclick="check(this);"><img src="{!! asset('image/yes.png') !!}" alt="tick"><input type="hidden" role-id="14" name="checkbox[14][13]" id="val-9-13" value="1"></td></tr></tbody>
						  </table>
					 
						<input type="button" name="role_update" id="role_update" class="pull-right btn btn-primary disabled" value="Update Permissions">
					  </form>
					</div>
				</div>
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