@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form name="client" method="post" action="/Client/create" id="client" ng-hide="showForm">
	{{csrf_field()}}
	<input type='hidden' name='edit_client' ng-model='edit_client' value="@{{edit_client}}">
	<div class="row">

		<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section>
				<h4>Client Information</h4>
			</section>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Name</label>
				<input class="form-control" type="text" name="name" value="" ng-model="client.name" required placeholder="Enter The Name"/>
				<span class="help-inline" ng-show="client.name.$touched && client.name.$invalid">required</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Gender</label>
				<select class="form-control" name="gender" ng-model='client.gender'>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Phone Number</label>
				<input class="form-control" type="text" name="phone_number" ng-model="client.phone_number" required numbers-only placeholder="Enter Phone Number"/>
				<span class="help-inline" ng-show="client.phone_number.$touched && client.phone_number.$invalid">required</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Email Address</label>
				<input class="form-control" type="email" name="email" ng-model="client.email" required placeholder="Enter Email Address">
				<span class="help-inline" ng-show="client.email.$touched && client.email.$invalid">required</span>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Skype</label>
				<input class="form-control" type="text" name="skype" ng-model="client.skype" required placeholder="Enter Skype ID"/>
				<span class="help-inline" ng-show="client.personal_skype.$touched && client.personal_skype.$invalid">required</span>
				<span class="help-inline" ng-show="client.personal_skype.$error.email">invalid email</span>
			</div>

			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>Address</label>
				<textarea ng-model="client.address" class="form-control" id="address" name="address" placeholder="Enter Permanent Address"></textarea>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group col-sm-6">
					<input type="button" class="button" ng-click="save()" value='update'>
				</div>
				<div class="form-group col-sm-6">
					<input type="button" class="button" ng-click="cancel()" value='cancel'>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</form>