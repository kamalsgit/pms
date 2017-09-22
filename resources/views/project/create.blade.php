@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

		<form method="post" action="/project/create" name="project" id="employee" ng-hide="showForm">
		{{csrf_field()}}
		 <div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section>
				<h4>Create Project</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>Project Title</label>
			<input type='hidden' name='edit_project' value="@{{edit_proj}}">
			<input class="form-control" type="text" name="title" value="" ng-model="project.title" required placeholder="Enter Project Title"/>
			<span class="help-inline" ng-show="project.title.$touched && project.title.$invalid">Required</span>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>Project Description</label>
			<textarea ng-model="project.description" name="description" class="form-control" required placeholder="Enter Project Description"></textarea>
			<span class="help-inline" ng-show="project.description.$touched && project.description.$invalid">Required</span>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label class="control-label" for="startdate">Start Date</label>
			<datepicker date-format="d MMMM, y">
			<input class="form-control" name="start_date" ng-model="project.start_date" type="text" placeholder="Select Start Date"/>
			<span class="help-inline" ng-show="project.start_date.$touched && project.start_date.$invalid">Required</span>
			<span ng-show="project.start_date.$error.start_date">Enter Valid Date.</span>
			</datepicker>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">	
			<label class="control-label" for="end_date">End Date</label>
			<datepicker date-format="d MMMM, y">
			<input class="form-control" name="end_date" ng-model="project.end_date" type="text" placeholder="Select End Date"/>
			<span class="help-inline" ng-show="project.end_date.$touched && project.end_date.$invalid">Required</span>
			<span ng-show="project.end_date.$error.end_date">Enter Valid Date.</span>
			</datepicker>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="team_id">Select Team Name </label>
			<select ng-model="project.team_id" class="form-control" name="team_id" ng-options="team.team_id as team.team_name for team in teams" >
			</select>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="status_id">Select Project Status</label>
			<select class="form-control" name='status_id' ng-model="project.project_state" ng-options="status.status_id as status.status_title for status in status_temp">
			</select>
			</div>
			
			<div class="clearfix"></div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group col-sm-2">
			<input type="submit" class="button" ng-click="pro_save()" value='Save'>
			</div>
			<div class="form-group col-sm-2">
			<input type="button" class="button" ng-click="pro_cancel()" value='Cancel'>
			</div>
			</div>
			<div class="clearfix"></div>	
			</div>
		 </div>
		</form>







<!-- <form method='post' action='/employees/create'>
{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="p_email">Personal Email</label>
    <input type="text" class="form-control" id="p_email"  name="p_email"placeholder="Enter Personal Email">
  </div>
  <div class="form-group">
    <label for="b_email">Business Email</label>
    <input type="text" class="form-control" id="b_email"  name="b_email" placeholder="Enter Business Email">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" name="pass"  id="pass"placeholder="Password">
  </div>
  <div class="form-group">
    <label for="p_skype">Personal Skype</label>
    <input type="text" class="form-control" id="p_skype" name="p_skype" placeholder="Enter Personal Skype">
  </div>
  <div class="form-group">
    <label for="b_skype">Business Skype</label>
    <input type="text" class="form-control" id="b_skype" name="b_skype" placeholder="Enter Business Skype">
  </div>
  <div class="form-group">
    <label for="ph_no">Phone NO</label>
    <input type="text" class="form-control" id="ph_no"  name="ph_no" placeholder="Enter Phone no">
  </div>
  <div class="form-group">
    <label for="bday">Bday</label>
    <input type="text" class="form-control" id="Bday" name="Bday" placeholder="Enter Bday">
  </div>
  <div class="form-group">
    <label for="doj">doj</label>
    <input type="text" class="form-control" id="doj" name="doj" placeholder="Enter doj">
  </div>
  <div class="form-group">
    <label for="padd">padd</label>
    <input type="text" class="form-control" name="padd"  id="padd"placeholder="Enter padd">
  </div>
  <div class="form-group">
    <label for="cadd">cadd</label>
    <input type="text" class="form-control" id="cadd" name="cadd" placeholder="Enter cadd">
  </div>
  <div class="form-group">
    <label for="role">role</label>
    <input type="text" class="form-control" id="role"  name="role" placeholder="Enter role">
  </div>

  <button type="submit" class="btn btn-primary">CREATE</button> 
</form>-->