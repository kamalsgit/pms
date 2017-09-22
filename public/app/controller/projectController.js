app.controller('projectController', function ($scope,$window, $filter,$http) {
	window.monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
	$scope.showForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}

 	$scope.status = [];
	$http({
	method:"get",
	url:"api/status"
	}).then(function(statusdata){
		$scope.status_temp = statusdata.data;
		angular.forEach($scope.status_temp,function(val,key){
			$scope.status[val.status_id] = val;
		});
	});

	$scope.successLoad = function(res){
		var data = angular.fromJson(res);
		$scope.items = data.data;
		angular.forEach($scope.items,function(v,k){
			
			$scope.items[k].status_title = $scope.status[v.project_state].status_title;
			
			var a = new Date(v.start_date*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			var start_date = day +' '+window.monthNames[month]+' '+year;
			$scope.items[k].start_date = start_date;
			a = new Date(v.end_date*1000);
			year = a.getFullYear();
			month = a.getMonth();
			day = a.getDate();
			var end_date = day +' '+window.monthNames[month]+' '+year;
			$scope.items[k].end_date = end_date;
		});
		$scope.imLoading = false;
	};
	$scope.errorLoad = function(err){
		console.log(err);
	};
	$scope.projectLoad = function(){
		$scope.imLoading = true;
		$http({
			method:"get",
			url:"api/project"
		}).then($scope.successLoad,$scope.errorLoad);
	}
	$scope.successTeamload = function(res){
		var data = angular.fromJson(res);
		$scope.teams = data.data;
		angular.forEach($scope.allLeads,function(v,i){
			angular.forEach($scope.teams,function(val, key){
				if(val.lead == v.emp_id)
					$scope.teams[key].lead_name = v.name;
			});
		});
		$scope.imLoading = false;

	};
	$scope.errorTeamLoad = function(err){
		console.log(err);
	};
	$scope.successLead = function(res){
		var data = angular.fromJson(res);
		$scope.allLeads = data.data;
		$scope.projectLoad();
	};
	$scope.errorTeamLead = function(err){
		console.log(err);
	};
	$scope.load_TLs = function(){
		$http({
			method:"get",
			url:"api/team/team-leaders"
		}).then($scope.successLead,$scope.errorLead);
	};
	$scope.load_TLs();
	$scope.loadTeams = function(){
		$http({
			method:"get",
			url:"api/team/teamlist"
		}).then($scope.successTeamload,$scope.errorTeamLoad);
	}
	$scope.loadTeams();
	$scope.proadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.project.title = "";
		$scope.project.description = "";
		$scope.project.start_date = "";
		$scope.project.end_date = "";
		$scope.project.is_delete = "";
		$scope.project.teamname = "";
		$scope.project.projectstatus = "";
	};
	
	$scope.proedit = function(edit){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.truefalse = true;
		$scope.edit_proj = edit;
		$scope.successproj = function(res){
			var data = angular.fromJson(res);
			$scope.project = data.data;
			var a = new Date($scope.project.start_date*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			//var dateofjoin = year+'/'+month+'/'+day;
			var sdate = day +' '+window.monthNames[month]+' '+year;
			$scope.project.start_date = sdate;
			
			var a = new Date($scope.project.end_date*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			//var birthday = year+'/'+month+'/'+day;
			var edate = day +' '+window.monthNames[month]+' '+year;
			$scope.project.end_date = edate;
			
		};
		$scope.errorproj = function(err){
			console.log(err);
		};

		$http({
		method:"get",
		url:"api/projects/edit/" + edit
		}).then($scope.successproj,$scope.errorproj);
	};
	
	$scope.pro_cancel = function(can){
		$scope.showList = false;
		$scope.showForm = true;
	};
	
	$scope.prodel = function(del){
		var success = function(res){
			angular.forEach($scope.items,function(i,v){
				if(i.project_id ==  del){
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
			url:"api/project/delete/" + del
			}).then($scope.success,$scope.error);
		}
	};
	
	/* $scope.successTask = function(res){
		console.log(res);
		var data = angular.fromJson(res);
		$scope.items = data.data;
	};
	$scope.errorTask = function(res){
		console.log(res);
	};
	$scope.load_task = function(pid){
			$http({
			method:"get",
			url:"api/project/" + pid
			}).then($scope.successTask,$scope.errorTask);
	}; */
	
});