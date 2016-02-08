
var app = angular.module('myApp', []);

app.controller('myController', function($scope, $http) {
  $scope.msg = "Sup, bruh?"  

  $scope.get_lifts = function() {
    $http.get('http://localhost:4000/api/lifts').then(
    	function(results) {
    		console.log(results.data);
    		return results.data;
    	}
    );
  }

  //$scope.lifts = $scope.get_lifts();

});
