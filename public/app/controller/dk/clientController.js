app.controller('dkclientController', function ($scope,$http) {
	$scope.showForm=true;
	$scope.clientadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.client = {};
		$scope.truefalse = false;

	};
	
	$scope.clientedit = function(edit){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.truefalse = true;
		$scope.edit_emp = edit;
		$scope.successclient = function(res){
			var data = angular.fromJson(res);
			$scope.client = data.data;
			var a = new Date($scope.client.dateofjoin*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			var dateofjoin = year+'/'+month+'/'+day;
			var doj = day +' '+window.monthNames[month]+' '+year;
			$scope.client.dateofjoin = doj;
			console.log($scope.client);
		};
		$scope.errorclient = function(err){
			console.log(err);
		};
		$http({
		method:"get",
		url:"api/client/getclient/" + edit
		}).then($scope.successclient,$scope.errorclient);
	};
	$scope.cancel = function(){
		$scope.showList = false;
		$scope.showForm = true;
	};
	$scope.clientdel = function(del){
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
	$scope.save = function(){
		var data = {};
		data['name']= $scope.client.name;
		data['address']= $scope.client.address;
		data['skype']= $scope.client.skype;
		data['email']= $scope.client.email;
		data['phone_number']= $scope.client.phone_number;
		data['gender']= $scope.client.gender;
		console.log(data);
		$http({
			method:"post",
			url:"api/client/save",
		/*	headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},*/
			data:data
		}).then(success,error);
	}
});