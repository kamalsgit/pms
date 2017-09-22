app.controller('myProjectController', function ($scope,$http) {
	
	$scope.successdetails = function(res){
		var data = angular.fromJson(res);
		$scope.details = data.data;
	};
	$scope.errordetails = function(err){
		console.log(err);
	};
	$scope.pdetails = function(res){
		$http({
		method:"get",
		url:"../api/project/details/" + res
		}).then($scope.successdetails,$scope.errordetails);
	};

});