app.controller('permissionController', function ($scope,$window, $filter,$http) {

	$scope.successLoad = function(res){
		var data = angular.fromJson(res);
		$scope.roles = data.data;
		$scope.imLoading = false;
	};
	$scope.errorLoad = function(err){
		console.log(err);
	};
	$scope.imLoading = true;
	$http({
		method:"get",
		url:"api/role/rolelist"
	}).then($scope.successLoad,$scope.errorLoad);
	
});