app.controller('punchingController', function ($scope,$window, $filter,$http) {
	$scope.showForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
	$scope.successPunch = function(res){
		var data = angular.fromJson(res);
		$scope.item = data.data;
			if($scope.item.length>0){
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
					function daysInMonth(month,year) {
						return new Date(year, month, 0).getDate();
					}
					daysthismonth = daysInMonth(mm,yyyy); // Month Count 31
					$scope.items = [];
					for(i=1; i<=daysthismonth; i++){
						today = i+'/'+mm+'/'+yyyy;
						angular.forEach($scope.item,function(k,v){
							if(i!=k.date){
							$scope.items.push({'date':today,'emp_intime':'0000000000000','emp_outtime':'0000000000000'});	
							}else{
							$scope.items.push({'emp_intime':k.emp_intime,'emp_outtime':k.emp_outtime,'date':today});
							}
						});
					}
				}else{
			
				}
		$scope.imLoading = false;
	};
	$scope.errorPunch = function(err){
		console.log(err);
	};
	$scope.imLoading = true;
	$http({
		method:"get",
		url:"api/punching"
	}).then($scope.successPunch,$scope.errorPunch);
});