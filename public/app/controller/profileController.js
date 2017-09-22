app.controller('profileController', function ($scope,$window,$timeout, $filter,$http) {
	$scope.gender = gend;
	$scope.is_married = mrd;
	console.log($scope.is_married );
	$scope.profile_cancel = function(){
		alert('tttt');
		$scope.showList = false;
		$scope.showForm = true;	
		$scope.loademp();
	};
	$timeout(function(){
		//alert($scope.genders)
		
	}, 1000);
});