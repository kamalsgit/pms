window.monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];

app.controller('navCtrl', function($scope, $http,$location) {
	$scope.Hide = false;
	var onsuc = (function(response) {
		var data1 = angular.fromJson(response);
		data1 = data1.data;
	});

    $scope.maxtable=function(arg){
		//$scope.Hide = true;
		$scope.Hide = $scope.Hide ? false : true;
		var myEl = angular.element( document.querySelector( '.panel' ));
		myEl.toggleClass('panel-fullscreen');
		myEl.toggleClass('content');
		
		var myE2 = angular.element( document.querySelector( '#panel-fullscreen' ));
		var $this = myE2;
	    if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
        }
		
    };

});




