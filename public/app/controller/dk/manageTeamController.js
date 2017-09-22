app.controller('manageTeamController', function ($scope,$http) {
	$scope.showForm =true;
	$scope.selectmembers =[];
	$scope.teamadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.team.name = "";
		$scope.team.lead = "";
		$scope.team.is_active = "";
		$scope.team.members = "";
		$scope.edit_team = "";
	};
	$scope.allMemebers = allMemebers;
	$scope.allMemebers2 = allMemebers;
	$scope.expectlead = allMemebers;
	console.log(allMemebers);

	$scope.Leaderchange = function(){
		$scope.expectlead = $scope.allMemebers;
		console.log(allMemebers);
		$scope.seniormembers = [];
		$scope.traineemembers = [];
		angular.forEach($scope.expectlead,function(i,j){
			if ($scope.team.lead == i.emp_id){
				$scope.expectlead.splice(j,1);
			}
		});
	}
	$scope.selectemployee = function(item){
		angular.forEach($scope.expectlead,function(i,j){
			if (item.emp_id == i.emp_id){
				$scope.expectlead.splice(j,1);
			}
		});
	}
	$scope.removeemployee = function(item){
		$scope.expectlead.push(item);
	}

});