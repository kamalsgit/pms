app.controller('teamController', function ($scope,$http) {
$scope.allteams = allteamsfromPHP;
$scope.showForm =true;
$scope.list1 = [];
        $scope.list2 = [];
        $scope.list3 = [];
        $scope.list4 = [];
        
        $scope.list5 = [
          { 'title': 'Item 1', 'drag': true },
          { 'title': 'Item 2', 'drag': true },
          { 'title': 'Item 3', 'drag': true },
          { 'title': 'Item 4', 'drag': true },
          { 'title': 'Item 5', 'drag': true },
          { 'title': 'Item 6', 'drag': true },
          { 'title': 'Item 7', 'drag': true },
          { 'title': 'Item 8', 'drag': true }
        ];
console.log(allteamsfromPHP);
});