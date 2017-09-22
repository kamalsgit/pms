@extends('layout.app')

@section('title', 'Update Profile')

@section('h1title',"My Profile")

@section('pageData')

<div class="profile_edit" ng-controller="profileController">
	<style>
	  .personal{
		<!-- 	background-color:red;
			margin:10px 0 10px 0;
			padding:10px; -->
		  }
		  .profile_form h2{
			background-color:#194585;
			margin:0px;
			padding:35px;
			text-transform:uppercase;
			font-weight:bold;
		  }
		  .profilefm{
			background-color:#bad1f1;
		  }
		  .profilefm{
			border-radius:0px 0px 0px 100px;
		  }
		  .profiles h2{
			border-radius:0px 100px 0px 0px;
		  }
		  .profile_photo{
			border:5px solid black;
			width:200px;
			height:210px;
			position:absolute;
			top:0px;
			right:0px;
			margin-right:15px;
			border-radius:0px 72px 0px 0px;
			background-color:#000;
			z-index: 999;
		  }
		  .profile_photo p{
			text-align:center;
			width:80%;
			margin:10px auto 0px;
		  }
		  .profile_photo .user-header{
			text-align:center;
		  }
		  .profile_photo p{
			color:#fff;
			font-size:15px;
			font-weight:bold;
		  }
		  .profiles h2{
			color:#fff;
		  }
		.profile_edit h2{
			text-align:left;
		}
		@media (max-width:320px){
		.profile_photo{
		  width:100%;
		  position:relative;
		  z-index: 999;
		  border-radius:0px;
		  display:block;
		}
		.profile_edit .profile_photo{
			right:0px;
		}
		}
	</style>
	<div class="profile_form col-sm-10 container-fluid text-center sidenav">
		<h4 class="header">Profile Edit <p><img ng-click="empadd()" src="image/add_button.png"> <img ng-click="sort('first_name')" src="image/sort_btn.png"></p></h4>
		<div class="col-sm-3 sidenav Lsidebar">
		  <div class="well">
			<p><input type="text" ng-model="empsearch" class="form-control" placeholder="Search"/></p>
		  </div>
		  <div class="well">
			<p>ADS</p>
		  </div>
		</div>
		<div class="col-sm-9 profiles content panel panel-default">
			<h2>My Profile</h2>
			<div class="profile_photo">
				<p>Profile Photo</p>
				<div class="user-header">
				<img alt="User Image" class="img-square" src="image/user2-160x160.jpg">
				</div>
			</div>
			<form name="updateProfile" method="post" action="/profile/saveProfile" class="profilefm">
				{{csrf_field()}}
				<div class="col-sm-12">
					<div class="col-sm-12"> &nbsp;</div>
					<div class="col-sm-4">
						<div class="form-group">
						  <label for="fname">First Name:</label>
						  <input type="text" class="form-control" placeholder="Enter First Name" name="name" value="{{$user->name}}">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						  <!--<label for="lname">Last Name:</label>-->
						  <input type="hidden" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-4">
						<div class="form-group">
						  <label for="bussiness_email">Business Email:</label>
						  <input readonly type="text" class="form-control" placeholder="Enter Busines Email" value="{{$user->business_email}}" name="bussiness_email">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						  <label for="bussiness_skype">Business Skype:</label>
						  <input readonly type="text" class="form-control" placeholder="Enter Business Skype" value="{{$user->business_skype}}" name="business_skype">
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-4">
						<div class="form-group">
						  <label for="my_phone_no">Phone No:</label>
						  <input type="text" class="form-control" placeholder="Enter Phone No" name="phone_number" value="{{$user->phone_number}}">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						  <label for="my_role_title">Select Role:</label>
						  <input readonly type="text" class="form-control" id="my_role_title" placeholder="Select Role" value="{{$user->role_id}}" name="role_id">
						</div>
					</div>
					<div class="col-sm-4">
						<label for="my_doj">Date Of Join</label>
						<div data-link-format="dd MM yyyy" data-link-field="doj" date-format="dd MM yyyy" >
						<input type="text" readonly="" class="form-control" value="{{$user->dateofjoin}}">
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-8">
						  <label for="my_current_address">Current Address</label>
						  <textarea id="my_current_address" class="form-control" value="{{$user->current_address}}" name="current_address">{{$user->current_address}}</textarea>
					</div>
					<div class="col-sm-4">
						  <label for="personal_email">Personal Email:</label>
						  <input type="text" placeholder="Enter Personal Email" class="form-control" value="{{$user->personal_email}}" name="personal_email">
					</div>
				</div>
				<div class="col-sm-12">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-8">
						  <label for="my_perment_address">Perment Address</label>
						  <textarea id="my_perment_address" class="form-control" value="{{$user->perment_address}}" name="perment_address">{{$user->perment_address}}</textarea>
					</div>
					<div class="col-sm-4">
						  <label for="personal_skype">Personal Skype:</label>
						  <input type="text" placeholder="Enter Personal Skype" id="personal_skype" class="form-control" value="{{$user->personal_skype}}" name="personal_skype">
					</div>
				</div>

				<div class="col-sm-12"> &nbsp;</div>
				<div class="col-sm-12">
				<div class="col-sm-4">
					<label for="birthday">
						Birthday :	</label>
						<datepicker date-format="d MMMM, y">
							<input required name="birthday" type="text" readonly="" class="form-control"  value="{{$user->birthday}}" placeholder="Select Birth Date"/>
						</datepicker>

				</div>
				<div class="col-sm-4 my_additional" style="display: block;" >
					<label for="gender">Gender :</label>
					<script>
					var gend="{!! $user->gender !!}"; 
					</script>
					<select class="form-control" name="gender" ng-model="gender">
						<option ng-selected="{{ $user->gender }}==male">male</option>
						<option ng-selected="{{ $user->gender }}==female">female</option>
					</select>
				</div>

				<div class="col-sm-4">
				<label for="is_married">Marital status:</label>
				<script>
					var mrd="{!! $user->is_married !!}"; 
				</script>
				<select ng-model="is_married" class="form-control" name="is_married">
					<option value="0" ng-selected="{{ $user->is_married }}==0">Single</option>
					<option value="1" ng-selected="{{ $user->is_married }}==1">Married</option>
				</select>
				</div>
				</div>

				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					  <label for="fname"></label>
				</div>
				<div class="col-sm-12">
					<div ng-hide="is_married==0" class="col-sm-4 my_additional" style="display: block;">
					  <label for="my_pname">Partner Name:</label>
					  <input type="text" ng-required="is_married==1" placeholder="Enter Partner Name" id="my_pname" class="form-control" value="{{$user->partner_name}}" name="partner_name">
					</div>
					<div ng-hide="is_married==0" class="col-sm-4 my_additional" style="display: block;">
					  <label for="my_pphone">Partner Phone:</label>
					  <input type="text" ng-required="is_married==1" placeholder="Enter Partner Phone" id="my_pphone" class="form-control" value="{{$user->partner_phone}}" name="partner_phone">
					</div>
					<div ng-hide="is_married==0" class="col-sm-4 my_additional" style="display: block;">
						<label class="control-label" for="my_anivar">Anniversary</label>
						<datepicker date-format="d MMMM, y">
							<input type="text" ng-required="is_married==1" class="form-control" readonly="" id="my_anivarsary" value="{{$user->anniversary}}" name="anniversary">
						</datepicker>
					</div>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					  <label for="fname"></label>
				</div>
				<div class="col-sm-12">&nbsp;</div>
				<div class="text-center">
					<input type="submit" value="Update" class="btn btn-default" id="my_save">
					<input type="button" value="Cancel" class="btn btn-default" id="my_cancel">
				</div>
				<br/>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					  <label for="fname"></label>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					  <label for="fname"></label>
				</div>
			</form>
		</div>
		<div class="col-sm-2">
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

@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('app/controller/profileController.js') !!}"></script>
@endsection