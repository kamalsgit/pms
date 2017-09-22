const app = angular.module('pmsApp',[]);
/* ---------------------------------------*/
app.controller('loginCtrl',function($rootScope,$scope, $http,$q,$timeout,$window){
		$scope.useremail = '';
		$scope.password = '';
		$scope.switchBool = function(value) {
		   $scope[value] = !$scope[value];
		};
		$scope.userlogin = function(event) {
			 var myEl = angular.element( document.querySelector( 'body' ) );
			 myEl.addClass('body_load');
			if ($scope.useremail!="" || $scope.password!="" )
				return false;
			event.preventDefault();
		}
	
});