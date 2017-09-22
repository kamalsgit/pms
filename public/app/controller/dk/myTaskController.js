app.controller('myTaskController', function ($scope,$http) {
	
	$scope.successtaskdetails = function(res){
		var data = angular.fromJson(res);
		$scope.taskdetails = data.data;
	};
	$scope.errortaskdetails = function(err){
		console.log(err);
	};
	$scope.tdetails = function(res){
		$http({
			method:"get",
			url:"api/task/details/" + res
		}).then($scope.successtaskdetails,$scope.errortaskdetails);
	};
		
	$scope.successattension = function(res){
		var data = angular.fromJson(res);
		$scope.attension = data.data;
		$scope.chat = $scope.attension.mychat;
	};
	$scope.errorattension = function(err){
		console.log(err);
	}; 
	$scope.getattension = function(res){
		$scope.attensions = null;
		$scope.notification = false;
 		$http({
			method:"get",
			url:"api/task/attension/" + res
		}).then($scope.successattension,$scope.errorattension);
	};
	
	/* $scope.successsaveattension = function(res){
		 console.log(res);
		var data = angular.fromJson(res);
		//$scope.attension = data.data;
	};
	$scope.errorsaveattension = function(err){
		console.log(err);
	};
	$scope.saveAttension = function(){
		$http({
			method:"post",
			url:"api/task/save/"
		}).then($scope.successsaveattension,$scope.errorsaveattension);
	}; */
	
	$scope.notify = function(res){
		$scope.notification = true;
	}

});
