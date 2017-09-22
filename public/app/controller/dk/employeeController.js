app.controller('dkemployeeController', function ($scope,$http) {
	$scope.managers = managers;
	$scope.showForm=true;
	$scope.dateofjoinreadonly = false;
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
		$scope.dateofjoinreadonly = false;
	};
	
	$scope.empedit = function(edit){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.truefalse = true;
		$scope.dateofjoinreadonly = true;
		$scope.edit_emp = edit;
		$scope.successemployee = function(res){
			var data = angular.fromJson(res);
			$scope.employee = data.data;
			console.log($scope.employee);
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
		url:APP_URL+"/api/user/getuser/" + edit
		}).then($scope.successemployee,$scope.erroremployee);
	};
	$scope.emp_cancel = function(){
		$scope.showList = false;
		$scope.showForm = true;
	};
	var error = function(res){
			console.log(res);
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
		
		if (confirm("Are You sure wants to delete?"))
		{
			$http({
			method:"get",
			url:APP_URL+"/api/user/delete/" + del
			}).then(success,error);
		}
	};
});
