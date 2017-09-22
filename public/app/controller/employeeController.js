app.controller('employeeController', function ($scope,$window, $filter,$http) {
	window.monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
		$scope.showForm = true;
		$scope.itemsperpage=5;
		$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	};
	$scope.edit_emp ='';
	$scope.roles = [];
	$http({
	method:"get",
	url:"api/user/roles"
	}).then(function(rolesdata){
		$scope.roles_temp = rolesdata.data;
		angular.forEach($scope.roles_temp,function(v,k){
			$scope.roles[v.role_id] = v;
		});
		$scope.loademp();
	});
	$scope.successUser = function(res){
		var data = angular.fromJson(res);
		$scope.items = data.data;
		angular.forEach($scope.items, function(value, key){
			  $scope.items[key].role_title = $scope.roles[value.role_id].role_title;
		});
		$scope.imLoading = false;
	};
	$scope.errorUser = function(err){
		console.log(err);
	};
	$scope.imLoading = true;
	$scope.loademp = function(){
		$http({
			method:"get",
			url:"api/employee"
		}).then($scope.successUser,$scope.errorUser);
	};
	$scope.empadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.employee = {};
		$scope.truefalse = false;
		$scope.name = "";
		$scope.edit_emp= "";
		$scope.password = "";
		$scope.dateofjoin = "";
		$scope.phone_number = "";
		$scope.current_address = "";
		$scope.personal_email = "";
		$scope.personal_skype = "";
		$scope.birthday = "";
		$scope.perment_address = "";
		$scope.is_married = "";
		$scope.partner_name = "";
		$scope.partner_phone = "";
		$scope.anniversary = "";
		//angular.element($("."));
	};
	
	$scope.empedit = function(edit){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.truefalse = true;
		$scope.edit_emp = edit;
		$scope.successemployee = function(res){
			var data = angular.fromJson(res);
			$scope.employee = data.data;
			var a = new Date($scope.employee.dateofjoin*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			var dateofjoin = year+'/'+month+'/'+day;
			var doj = day +' '+window.monthNames[month]+' '+year;
			$scope.employee.dateofjoin = doj;
			var a = new Date($scope.employee.birthday*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			var birthday = year+'/'+month+'/'+day;
			var birth = day +' '+window.monthNames[month]+' '+year;
			$scope.employee.birthday = birth;
			
			var a = new Date($scope.employee.anniversary*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			var anniversary = year+'/'+month+'/'+day;
			var aniver = day +' '+window.monthNames[month]+' '+year;
			$scope.employee.anniversary = aniver;
		};
		$scope.erroremployee = function(err){
			console.log(err);
		};

		$http({
		method:"get",
		url:"api/user/getuser/" + edit
		}).then($scope.successemployee,$scope.erroremployee);
	};
	
	$scope.emp_cancel = function(){
		$scope.showList = false;
		$scope.showForm = true;
	};
	$scope.empdel = function(del){
		var success = function(res){
			console.log(res);
			angular.forEach($scope.items,function(i,v){
				if(i.emp_id ==  del){
					$scope.items.splice(v, 1)
				}
			});
		};
		var error = function(res){
			console.log(res);
		};
		if (confirm("Are You sure wants to delete?"))
		{
			$http({
			method:"get",
			url:"api/user/delete/" + del
			}).then(success,error);
		}
	};
});