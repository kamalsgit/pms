app.controller('teamController', function ($scope,$window, $filter,$http) {
	$scope.showForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	};
	
	$scope.successTeamload = function(res){
		var data = angular.fromJson(res);
		$scope.items = data.data;
		angular.forEach($scope.items, function(value, key){
			//$scope.items[key].leader = $scope.team_lead[value.lead].name;
			angular.forEach($scope.team_lead,function(v,k){
				if (v.emp_id == value.lead)
				{
					$scope.items[key].leader = v.name;
				}
			});
		});
		$scope.imLoading = false;
	};
	$scope.errorTeamload = function(err){
		console.log(err);
	};
	$scope.teamLoad = function(){
		$scope.imLoading = true;
		$http({
			method:"get",
			url:"api/team/teamlist"
		}).then($scope.successTeamload,$scope.errorTeamload);
	};

	$scope.teamadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.team.name = "";
		$scope.team.lead = "";
		$scope.team.is_active = "";
		$scope.team.members = "";
		$scope.edit_team = "";
	};

	$scope.teamedit = function(edit){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.truefalse = true;
		$scope.edit_team = edit;
		$scope.successteam = function(res){
			var data = angular.fromJson(res);
			$scope.team = data.data;
			$scope.selectmembers=[];
			var mem = JSON.parse(data.data.members);
			angular.forEach(mem,function(v, k) {
				angular.forEach($scope.allMemebers,function(value, key) {
					if (v == value.emp_id)
						$scope.selectmembers.push({'emp_id':value.emp_id,'name':value.name});
				});
			});
		};
		$scope.errorteam = function(err){
			console.log(err);
		};

		$http({
		method:"get",
		url:"api/team/edit/" + edit
		}).then($scope.successteam,$scope.errorteam);
	};

		$scope.team_cancel = function(can){
		$scope.showList = false;
		$scope.showForm = true;
	};

	$scope.successLead = function(res){
		$scope.team_lead = [];
		var data = angular.fromJson(res);

		$scope.team_lead = data.data;
		$scope.allLeads = data.data;
		$scope.teamLoad();
	};
	$scope.errorLead = function(err){
		console.log(err);
	};
	$scope.successMemb = function(res){
		//console.log(res);
		var data = angular.fromJson(res);
		$scope.allMemebers = data.data;
	};
	$scope.errorMemb = function(err){
		console.log(err);
	};
	$scope.loadmember = function(){
		$http({
			method:"get",
			url:"api/team/team-members"
		}).then($scope.successMemb,$scope.errorMemb);
	};
	$scope.loadmember();
	$scope.load_TLs = function(){
		$http({
			method:"get",
			url:"api/team/team-leaders"
		}).then($scope.successLead,$scope.errorLead);
	};
	$scope.load_TLs();
	$scope.onSubmit = function () {
		if($scope.multipleSelectForm.$invalid){
			if($scope.multipleSelectForm.$error.required != null){
				$scope.multipleSelectForm.$error.required.forEach(function(element){
					element.$setDirty();
				});
			}
			return null;
		}
		alert("Field is Valid");
	};
	
	$scope.teamdel = function(del){
		var success = function(res){
			console.log(res);
			angular.forEach($scope.items,function(i,v){
				if(i.team_id ==  del){
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
			url:"api/team/delete/" + del
			}).then(success,error);
		}
		
	};
});