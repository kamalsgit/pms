@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form name="employee" method="post" action="/employees/create" id="employee" ng-hide="showForm">
	{{csrf_field()}}
	<input type='hidden' name='edit_emp' ng-model='edit_emp' value="@{{edit_emp}}">
	<div class="row">
		<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section>
				<h4>Add New Employee</h4>
			</section>
		</div>
		<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<section>
				<h4>Personal Information</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Name</label>
				<input class="form-control" type="text" name="name" value="" ng-model="employee.name" required placeholder="Enter The Name"/>
				<span class="help-inline" ng-show="employee.name.$touched && employee.name.$invalid">required</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Gender</label>
				<select ng-model="employee.gender" class="form-control" name="gender">
					<option value="male" ng-selected="employee.gender ==male">Male</option>
					<option value="female" ng-selected="employee.gender ==female">Female</option>
				</select>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Phone Number</label>
				<input class="form-control" type="text" name="phone_number" ng-model="employee.phone_number" required numbers-only placeholder="Enter Phone Number"/>
				<span class="help-inline" ng-show="employee.phone_number.$touched && employee.phone_number.$invalid">required</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Email Address</label>
				<input class="form-control" type="email" name="personal_email" ng-model="employee.personal_email" required placeholder="Enter Email Address">
				<span class="help-inline" ng-show="employee.personal_email.$touched && employee.personal_email.$invalid">required</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Skype</label>
				<input class="form-control" type="text" name="personal_skype" ng-model="employee.personal_skype" required placeholder="Enter Skype ID"/>
				<span class="help-inline" ng-show="employee.personal_skype.$touched && employee.personal_skype.$invalid">required</span>
				<span class="help-inline" ng-show="employee.personal_skype.$error.email">invalid email</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Birth Day</label>
				<datepicker date-format="d MMMM y">
					<input class="form-control" required name="birthday" ng-model="employee.birthday" type="text" readonly="" placeholder="Select Birth Date"/>
					<span class="help-inline" ng-show="employee.birthday.$touched && employee.birthday.$invalid">required</span>
					<span ng-show="employee.birthday.$error.required">Date Is Required.</span>
				</datepicker>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Permanent Address</label>
				<textarea ng-model="employee.perment_address" class="form-control" id="my_perment_address" name="perment_address" placeholder="Enter Permanent Address"></textarea>
			</div>

			<div ng-hide="employee.is_married==0" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 my_additional">	
				<label class="control-label" for="partner_name">Anniversary</label>
				<datepicker date-format="d MMMM y">
				<input class="form-control" ng-required="employee.is_married==1" name="anniversary" ng-model="employee.anniversary" type="text" placeholder="Select Anniversary Date"/>
				<span class="help-inline" ng-show="employee.anniversary.$touched && employee.anniversary.$invalid">required</span>
				<span ng-show="employee.anniversary.$error.anniversary">Enter Valid Date.</span>
				</datepicker>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 emp_form">
				<label></label>
			</div>
		</div>

		<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<section>
				<h4>Official Information</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Assigned Manager</label> 
				<select ng-model="employee.manager" class="form-control" name="manager">
					<option ng-repeat="manager in managers" value="@{{manager.emp_id}}" ng-selected="employee.manager ==@{{manager.emp_id}}">@{{manager.name}}</option>
				</select>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Business Email</label>
				<input class="form-control" type="text" class="form-control" ng-model="employee.business_email" ng-readonly="truefalse" name="business_email" placeholder="Enter Business Email">
			</div>

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label for="bussiness_skype_html">Business Skype</label>
				<input class="form-control" type="text" ng-model="employee.business_skype" ng-readonly="truefalse" class="form-control" id="bussiness_skype" name="bussiness_skype" placeholder="Enter Business Skype">
			</div>

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Date Of Join</label>
				<datepicker date-format="d MMMM y">
				<input class="form-control" required name="dateofjoin" ng-model="employee.dateofjoin" type="text" ng-readonly="dateofjoinreadonly" placeholder="select date of joining"/>
				<span class="help-inline" ng-show="employee.dateofjoin.$touched && employee.dateofjoin.$invalid">required</span>
				<span ng-show="employee.dateofjoin.$error.required">date is required.</span>
				</datepicker>
			</div>	

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Current Address</label>
				<textarea ng-model="employee.current_address" class="form-control" id="my_current_address" name="current_address" placeholder="Enter Current Address"></textarea>
			</div>

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label for="email">Marital Status</label>
				<select ng-model="employee.is_married" class="form-control" name="marital">
					<option value="0" ng-selected="employee.is_married ==0">Single</option>
					<option value="1" ng-selected="employee.is_married ==1">Married</option>
				</select>
			</div>

			<div ng-hide="employee.is_married==0" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 my_additional">	
				<label class="control-label" for="partner_name">Partner Name</label>
				<input class="form-control" type="text" name="partner_name" ng-model="employee.partner_name" ng-required="employee.is_married==1" placeholder="Enter Partner Name"/>
				<span class="help-inline" ng-show="employee.partner_name.$touched && employee.partner_name.$invalid">required</span>
			</div>

			<div ng-hide="employee.is_married==0" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 my_additional">	
				<label class="control-label" for="partner_name">Phone Number</label>
				<input class="form-control" ng-required="employee.is_married==1" type="text" name="partner_phone" ng-model="employee.partner_phone" numbers-only placeholder="Enter Partner Phone"/>
				<span class="help-inline" ng-show="employee.partner_phone.$touched && employee.partner_phone.$invalid">required</span>
			</div>

			<div class="clearfix"></div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group col-sm-6">
					<input type="submit" class="button" ng-click="emp_upd()" value='update'>
				</div>
				<div class="form-group col-sm-6">
					<input type="button" class="button" ng-click="emp_cancel()" value='cancel'>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
</form>