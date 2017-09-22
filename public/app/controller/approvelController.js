app.controller('approvelsController', function ($scope,$window, $filter,$http) {
	$scope.showForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
	$scope.successapprovels = function(res){
		var data = angular.fromJson(res);
		$scope.items = data.data;
		$scope.imLoading = false;
	};
	$scope.errorapprovels = function(err){
		console.log(err);
	};
	$scope.teamLoad = function(){
		$scope.imLoading = true;
		$http({
			method:"get",
			url:"api/approvel"
		}).then($scope.successapprovels,$scope.errorapprovels);
	};
	
});