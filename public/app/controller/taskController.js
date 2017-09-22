angular.module('tabsDemoDynamicHeight', ['ngMaterial']);
app.controller('taskController', function ($scope,$window, $filter,$http) {
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
	url:"../api/status"
	}).then(function(statusdata){
		$scope.status_temp = statusdata.data;
		angular.forEach($scope.status_temp,function(val,key){
			$scope.status[val.status_id] = val;
		});
	});

 	$scope.assigne = [];
	$http({
	method:"get",
	url:"../api/employee"
	}).then(function(assignedata){
		$scope.assignee_temp = assignedata.data;
		angular.forEach($scope.assignee_temp,function(val,key){
			$scope.assigne[val.emp_id] = val;
		});
	});

 	$scope.priorities = [];
	$http({
	method:"get",
	url:"../api/priority"
	}).then(function(prioritydata){
		$scope.priority_temp = prioritydata.data;
		angular.forEach($scope.priority_temp,function(val,key){
			$scope.priorities[val.priority_id] = val;
		});
	});

 	$scope.tasktypes = [];
	$http({
	method:"get",
	url:"../api/task_type"
	}).then(function(taskdata){
		$scope.task_temp = taskdata.data;
		angular.forEach($scope.task_temp,function(val,key){
			$scope.tasktypes[val.task_type_id] = val;
		});
	});
	
 	$scope.teamNames = [];
	$http({
	method:"get",
	url:"../api/team/teamlist"
	}).then(function(teamdata){
		$scope.team_temp = teamdata.data;
		angular.forEach($scope.team_temp,function(val,key){
			$scope.teamNames[val.team_id] = val;
		});
	});

	$scope.taskadd = function(){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.task.title = "";
		$scope.task.description = "";
		$scope.task.start_date = "";
		$scope.task.end_date = "";
		$scope.task.is_delete = "";
		$scope.task.teamname = "";
		$scope.task.tasktatus = "";
	};
	$scope.task_cancel = function(can){
		$scope.showList = false;
		$scope.showForm = true;
	};

	$scope.taskedit = function(edit){
		$scope.showList = true;
		$scope.showForm = false;
		$scope.truefalse = true;
		$scope.edit_task = edit;
		$scope.successtask = function(res){
			var data = angular.fromJson(res);
			$scope.task = data.data;
			var a = new Date($scope.task.start_date*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			//var dateofjoin = year+'/'+month+'/'+day;
			var sdate = day +' '+window.monthNames[month]+' '+year;
			$scope.task.start_date = sdate;
			
			var a = new Date($scope.task.end_date*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			//var birthday = year+'/'+month+'/'+day;
			var edate = day +' '+window.monthNames[month]+' '+year;
			$scope.task.end_date = edate;
			
		};
		$scope.errortask = function(err){
			console.log(err);
		};
		
		$http({
		method:"get",
		url:"../api/edittask/" + edit
		}).then($scope.successtask,$scope.errortask);
	};
	
	$scope.successproj = function(res){
		var data = angular.fromJson(res);
		$scope.prodetails = data.data;
		$scope.prodetails.status_title = $scope.status[$scope.prodetails.project_state].status_title;
			var a = new Date($scope.prodetails.start_date*1000);
			var year = a.getFullYear();
			var month = a.getMonth();
			var day = a.getDate();
			var start_date = day +' '+window.monthNames[month]+' '+year;
			$scope.prodetails.start_date = start_date;
			a = new Date($scope.prodetails.end_date*1000);
			year = a.getFullYear();
			month = a.getMonth();
			day = a.getDate();
			var end_date = day +' '+window.monthNames[month]+' '+year;
			$scope.prodetails.end_date = end_date;
		if($scope.prodetails.team_id == $scope.teamNames[$scope.prodetails.team_id].team_id){
			$scope.prodetails.team_name = $scope.teamNames[$scope.prodetails.team_id].team_name;
		}
		$scope.imLoading = false;
	};
	$scope.errorproj = function(err){
		console.log(err);
	};
	$scope.proj_details = function(){
		var pid = angular.element('#PID').val();	
		$http({
			method:"get",
			url:"../api/projects/edit/" + pid
		}).then($scope.successproj,$scope.errorproj);
	 };
	$scope.proj_details();
	
	$scope.individual_task = function(){
		var items = [];
		var res = angular.element('#tsks').val();
		//console.log(res);
		var data = angular.fromJson(res);
		$scope.items = data;
		//console.log($scope.items);
		angular.forEach($scope.items,function(v,k){
			$scope.items[k].status_title = $scope.status[v.task_status].status_title;
			$scope.items[k].name = $scope.assigne[v.assignee].name;
			$scope.items[k].prioritytitle = $scope.priorities[v.priority].title;
			$scope.items[k].tasktitle = $scope.tasktypes[v.task_type].title;
			
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
	
	$scope.taskdel = function(del){
		var success = function(res){
			angular.forEach($scope.items,function(i,v){
				console.log(i);
				if(i.task_id ==  del){
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
			url:"../api/task/delete/" + del
			}).then($scope.success,$scope.error);
		}
	};

});