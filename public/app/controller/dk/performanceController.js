app.controller('performanceController', function ($scope,$window, $filter,$http,$interval) {
	window.monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
	$scope.showForm = true;
	$scope.showLeaveForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.leave_types = [];
	$scope.leaves = [];
 	$scope.leavestatus = [];
	$scope.errorLoad = function(err){
		console.log(err);
	};

	$scope.successPermissiontype = function(res){
		var data = angular.fromJson(res);
		$scope.permission_types = data.data;
	}
	$scope.permissionTypes = function(){
		$http({
			method:"get",
			url:"api/permission/types"
		}).then($scope.successPermissiontype,$scope.errorLoad);
	};
	
	
	$scope.successendtime = function(res){
		var data = angular.fromJson(res);
		if (data.data==1){
			$window.location.href = '/logout';

		}
	}

	$scope.stopday = function(){
			$http({
				method:"get",
				url:"api/performance/endtime"
			}).then($scope.successendtime,$scope.errorLoad);
	}
	

	$scope.app_perm = function(){
		$scope.isDisabled = false;
		$scope.showList = true;
		$scope.showForm = false;
		$scope.permission.truefalse = false;
		$scope.permission.edit_per = '';
		$scope.permission.permission_date = "";
		$scope.permission.start_time = "";
		$scope.permission.end_time = "";
		$scope.permission.punch_out_type = "";
		$scope.permission.reason = "";
	};
	
	$scope.app_leav = function(){
		$scope.isDisabled = false;		
		$scope.showList = true;
		$scope.showForm = true;
		$scope.showLeaveForm = false;
		$scope.leave.truefalse = false;
		$scope.leave.startdate = "";
		$scope.leave.enddate = "";
		$scope.leave.leavetype = "";
		$scope.leave.reason = "";
	};

	$scope.editpermission = function(pid){
		$scope.showList = true;
		$scope.successperm = function(res){
			var data = angular.fromJson(res);
			$scope.data = data.data;
			
			console.log($scope.data);
			
			
			//console.log($scope.data.permission_type);
			if($scope.data.permission_type !=0){
				$scope.isDisabled = true;		
				$scope.edit_per = pid;
				$scope.permission = data.data;
				$scope.showForm = false;
				var a = new Date($scope.permission.start*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				var hours = a.getHours();
				var minutes = a.getMinutes();
				var ampm = hours >= 12 ? 'PM' : 'AM';
				hours = hours % 12;
				hours = hours ? hours : 12; // the hour '0' should be '12'
				minutes = minutes < 10 ? '0'+minutes : minutes;
				var start = hours + ':' + minutes + ' ' + ampm;
				
				var sdate = day +' '+window.monthNames[month]+' '+year;
				$scope.permission.permission_date = sdate;
				$scope.permission.start = start;
				
				var a = new Date($scope.permission.end*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				
				var hours = a.getHours();
				var minutes = a.getMinutes();
				var ampm = hours >= 12 ? 'PM' : 'AM';
				hours = hours % 12;
				hours = hours ? hours : 12; // the hour '0' should be '12'
				minutes = minutes < 10 ? '0'+minutes : minutes;
				var end = hours + ':' + minutes + ' ' + ampm;
				$scope.permission.end = end;
			}else {
				$scope.isDisabled = true;
				$scope.edit_leav = pid;
				$scope.showLeaveForm = false;
				$scope.leave = data.data;
				
				var a = new Date($scope.leave.start*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				var sdate = day +' '+window.monthNames[month]+' '+year;
				$scope.leave.startdate = sdate;
				
				var a = new Date($scope.leave.end*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				var edate = day +' '+window.monthNames[month]+' '+year;
				$scope.leave.enddate = edate;
				$scope.leave.leavetype = $scope.leave.leave_type;
			}
		};
		$scope.errorperm = function(err){
			console.log(err);
		};		
		$http({
			method:"get",
			url:"api/permission/edit/" + pid
		}).then($scope.successperm,$scope.errorperm);
	};
	
	$scope.perm_cancel = function(can){
		$scope.showList = false;
		$scope.showForm = true;
	};
	$scope.leav_cancel = function(can){
		$scope.showList = false;
		$scope.showLeaveForm = true;
	};
	$scope.permissionTypes();
	$scope.successstarttime = function(res){
		var data = angular.fromJson(res);
		$scope.starttime = data.data;
		var startdate = '';
		var intime = $scope.starttime.emp_intime;
		if($scope.starttime.success==1){
			startdate = new Date(intime*1000);
			$interval( function() {
				newdate = new Date();
				var y =(newdate.getYear()-startdate.getYear())+startdate.getYear();
				var m = (newdate.getMonth()-startdate.getMonth())+startdate.getMonth();
				var d = (newdate.getDate()-startdate.getDate())+startdate.getDate();
				var h = (newdate.getHours()-startdate.getHours());
				var min = (newdate.getMinutes()-startdate.getMinutes());
				var sec = (newdate.getSeconds()-startdate.getSeconds());
				var msec = (newdate.getMilliseconds()-startdate.getMilliseconds());
				var ti = new Date(y,m,d,h,min,sec,msec);
				var newDate = ti;
				var seconds = ti.getSeconds();
				$scope.second = ( seconds < 10 ? "0" : "" ) + seconds;
				var minutes = ti.getMinutes();
				$scope.minute = ( minutes < 10 ? "0" : "" ) + minutes;
				var hours = ti.getHours();
				$scope.hour = ( hours < 10 ? "0" : "" ) + hours;
				
				}, 1000);
		}else{
				console.log('process pending... ');
		}
	}

	$http({
		method:"get",
		url:"api/performance/starttime"
	}).then($scope.successstarttime,$scope.errorLoad);
	
	
	$http({
		method:"get",
		url:"api/leave/types"
	}).then(function(leavetypedata){
		$scope.leavetype_temp = leavetypedata.data;
		angular.forEach($scope.leavetype_temp,function(val,key){
			$scope.leave_types[val.id] = val;
			if(val.id!=1){
				$scope.leaves[val.id] = val;
			}
		});
	});

	$http({
		method:"get",
		url:"api/leave/status"
	}).then(function(leavestatusdata){
		$scope.leavestatus_temp = leavestatusdata.data;
		angular.forEach($scope.leavestatus_temp,function(val,key){
			$scope.leavestatus[val.id] = val;
		});
	});
	
	$scope.performancedel = function(del){
		var success = function(res){
			console.log(res);
			angular.forEach($scope.items,function(i,v){
				if(i.id ==  del){
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
			url:"api/permission/delete/" + del
			}).then(success,error);
		}
	};
	
});