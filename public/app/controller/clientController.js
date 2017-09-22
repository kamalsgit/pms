app.controller('clientController', function ($scope,$window, $filter,$http) {
	$scope.showForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	};
	$scope.clientadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.client = {};
		$scope.client.name ='';
		$scope.client.gender ='male';
		$scope.client.phone_number ='';
		$scope.client.email ='';
		$scope.client.skype ='';
		$scope.client.address ='';
	};
});