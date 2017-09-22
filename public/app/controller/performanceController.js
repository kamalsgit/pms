app.controller('performanceController', function ($scope,$window, $filter,$http,$interval) {
	window.monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
	$scope.showForm = true;
	$scope.showLeaveForm = true;
	$scope.itemsperpage=5;
	$scope.items = null;
	$scope.sort = function(keyname){
		$scope.sortKey = keyname;   //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
	$scope.successLoad = function(res){
		var data = angular.fromJson(res);
		$scope.items = data.data;
		angular.forEach($scope.items,function(v,k){
		
		if(v.leave_type==0){
			$scope.items[k].leave_type_title = 'Permission';
		}else{
			$scope.items[k].leave_type_title = $scope.leave_types[v.leave_type].type_name;			
		}
		
		if(v.status==0){
			$scope.items[k].status = 'Pending';
		}else{
			$scope.items[k].status = $scope.leavestatus[v.status].leavestatus;
		}
		if(v.is_cancelled==1){
			$scope.items[k].status = 'Cancelled';			
		}
			//$scope.items[k].leave_type_title = "Leave";
			if (v.leave_type==0){
				//$scope.items[k].leave_type_title = "Permission";
				var a = new Date(v.start*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				var date = day+'/'+ month +"/"+year;
				var start = a.getHours() +":"+a.getMinutes();
				var b = new Date(v.end*1000);
				var end = b.getHours() +":"+b.getMinutes();
				$scope.items[k].duriation = date +' '+start+' To '+end;
			}else{
				//$scope.items[k].leave_type_title = "Leave";
				var a = new Date(v.start*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				var start = day+'/'+month+"/"+year;
				var a = new Date(v.end*1000);
				var year = a.getFullYear();
				var month = a.getMonth();
				var day = a.getDate();
				var end = day+'/'+month+"/"+year;
				$scope.items[k].duriation =start+' To '+end;
			}
		});
		
		$scope.imLoading = false;
	};
	$scope.errorLoad = function(err){
		console.log(err);
	};
	$scope.loadPermissions = function(){
		$scope.imLoading = true;
		$http({
			method:"get",
			url:"api/permission/list"
		}).then($scope.successLoad,$scope.errorLoad);
	};
	/* $scope.successLeavetype = function(res){
		var data = angular.fromJson(res);
		$scope.leave_types = data.data;
	};
	$scope.leavetypes = function(){
		$http({
			method:"get",
			url:"api/leave/types"
		}).then($scope.successLeavetype,$scope.errorLoad);
	};
	
	$scope.successLeavestatus = function(res){
		var data = angular.fromJson(res);
		$scope.leave_status = data.data;
	};
	$scope.leavestatus = function(){
		$http({
			method:"get",
			url:"api/leave/status"
		}).then($scope.successLeavestatus,$scope.errorLoad);
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
	} */
	
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
	
	
	$scope.successendtime = function(res){
		var data = angular.fromJson(res);
		$scope.endtime = data.data;
	}

	$scope.stopday = function(){
			$http({
				method:"get",
				url:"api/performance/endtime"
			}).then($scope.successendtime,$scope.errorLoad);
	}
	
 	$scope.leave_types = [];
	$scope.leaves = [];
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
	
 	$scope.leavestatus = [];
	$http({
	method:"get",
	url:"api/leave/status"
	}).then(function(leavestatusdata){
		$scope.leavestatus_temp = leavestatusdata.data;
		angular.forEach($scope.leavestatus_temp,function(val,key){
			$scope.leavestatus[val.id] = val;
		});
	});
	
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
		//$scope.showForm = false;
		//$scope.showLeaveForm = false;
		//$scope.edit_per = pid;
		//$scope.truefalse = true;
		$scope.successperm = function(res){
			var data = angular.fromJson(res);
			$scope.data = data.data;
			//console.log($scope.permission);
			
		if($scope.data.permission_type !=0){
			$scope.isDisabled = true;			
			$scope.edit_per = pid;
			$scope.permission = data.data;
			$scope.showForm = false;
			
			//if($scope.permission.permission_type==''){
				//$scope.permission.permission_type = 1;
			//}
			
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
			
		//angular.forEach($scope.permission,function(v,k){
		//});
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
	//$scope.leavetypes();
	$scope.loadPermissions();
	$scope.permissionTypes();
	//$scope.leavestatus();
});