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
		 <div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<section>
				<h4>personal information</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>first name</label>
			<input type="text" name="name" value="@{{employees.name}}" ng-model="employees.name" required placeholder="enter first name"/>
			<span class="help-inline" ng-show="employees.name.$touched && employees.name.$invalid">required</span>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>last name</label>
			<input type="text" name="last_name" ng-model="employee.last_name" required placeholder="enter last name">
			<span class="help-inline" ng-show="employee.last_name.$touched && employee.last_name.$invalid">required</span>
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>password</label>
			<input type="text" name="password" ng-model="employee.password" required numbers-only placeholder="enter password"/>
			<span class="help-inline" ng-show="employee.password.$touched && employee.password.$invalid">required</span>
			</div>

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>gender</label>
			<select class="form-control" name="gender">
				<option value="1">male</option>
				<option value="0">female</option>
			</select>
			</div>
				
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>phone number</label>
			<input type="text" name="phone_number" ng-model="employee.phone_number" required numbers-only placeholder="enter phone number"/>
			<span class="help-inline" ng-show="employee.phone_number.$touched && employee.phone_number.$invalid">required</span>
			</div>	
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>email address</label>
			<input type="text" name="last_name" ng-model="employee.personal_email" required placeholder="enter last name">
			<span class="help-inline" ng-show="employee.personal_email.$touched && employee.personal_email.$invalid">required</span>
			</div>	
					
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>skype id</label>
			<input type="email" name="email" ng-model="employee.personal_skype" required placeholder="enter skype id"/>
			<span class="help-inline" ng-show="employee.personal_skype.$touched && employee.personal_skype.$invalid">required</span>
			<span class="help-inline" ng-show="employee.personal_skype.$error.email">invalid email</span>
			</div>	
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>birth day</label>
			<datepicker date-format="d mmmm, y">
			<input required name="birthday" ng-model="employee.birthday" type="text" readonly="" placeholder="select birth date"/>
			<span class="help-inline" ng-show="employee.birthday.$touched && employee.birthday.$invalid">required</span>
			<span ng-show="employee.birthday.$error.required">date is required.</span>
			</datepicker>
			</div>
				
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>perment address</label>
			<textarea ng-model="employee.perment_address" class="form-control" id="my_perment_address"></textarea>
			</div>
					
		</div>	
		
		<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">	
			<section>
			<h4>official information</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>business email : </label>
			<input type="text" class="form-control" ng-readonly="">
			</div>
			
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="bussiness_skype_html">business skype : </label>
			<input type="text" ng-readonly="truefalse" class="form-control" id="my_bussiness_skype" value="">	
			</div>

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>select role:</label>
			<input type="text" ng-readonly="truefalse" class="form-control" id="role_title" name="role_title">
			</div>
					
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>date of join:</label>
			<datepicker date-format="d mmmm, y">
			<input required name="dateofjoin" ng-model="employee.dateofjoin" readonly="" type="text" placeholder="select date of joining"/>
			<span class="help-inline" ng-show="employee.dateofjoin.$touched && employee.dateofjoin.$invalid">required</span>
			<span ng-show="employee.dateofjoin.$error.required">date is required.</span>
			</datepicker>
			</div>	
					
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label>current address</label>
			<textarea name="current_address" ng-module="employee.current_address" class="form-control" id="my_current_address"></textarea>
			</div>
				
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label for="email">marital status:</label>
			<select ng-model="employee.is_married" class="form-control" name="marital">
				<option value="0" ng-selected="employee.is_married ==0">single</option>
				<option value="1" ng-selected="employee.is_married ==1">married</option>
			</select>
			</div>
				
			<div ng-hide="employee.is_married==0" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 my_additional">	
			<label class="control-label" for="partner_name">partner name : </label>
			<input type="text" name="partner_name" ng-model="employee.partner_name" ng-required="employee.is_married==1" placeholder="enter partner name"/>
			<span class="help-inline" ng-show="employee.partner_name.$touched && employee.partner_name.$invalid">required</span>
			</div>
			
			<div ng-hide="employee.is_married==0" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 my_additional">	
			<label class="control-label" for="partner_name">phone number : </label>
			<input ng-required="employee.is_married==1" type="text" name="partner_phone" ng-model="employee.partner_phone" numbers-only placeholder="enter partner phone"/>
			<span class="help-inline" ng-show="employee.partner_phone.$touched && employee.partner_phone.$invalid">required</span>
			</div>
					
			<div ng-hide="employee.is_married==0" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 my_additional">	
			<label class="control-label" for="partner_name">anniversary : </label>
			<datepicker date-format="d mmmm, y">
			<input ng-required="employee.is_married==1" name="anniversary" ng-model="employee.anniversary" type="text" placeholder="enter anniversary date"/>
			<span class="help-inline" ng-show="employee.anniversary.$touched && employee.anniversary.$invalid">required</span>
			<span ng-show="employee.anniversary.$error.anniversary">enter valid date.</span>
			</span>
			</datepicker>
			</div>
			
			<div class="clearfix"></div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group col-sm-6">
			<input type="button" class="button" ng-click="emp_upd()" value='update'>
			</div>
			<div class="form-group col-sm-6">
			<input type="button" class="button" ng-click="emp_cancel()" value='cancel'>
			</div>
			</div>
			<div class="clearfix"></div>	
		</div>

		 </div>
		</form>


<!--<form id="employee" method='post' action='/employees/create' ng-hide='showForm'>
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