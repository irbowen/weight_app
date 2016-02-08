
var app = angular.module('myApp', []);

app.controller('myController', function($scope, $http) {
  $scope.msg = "Sup, bruh?"  

  $scope.get_lifts = function() {
    $http.get('http://localhost:4000/api/lifts').then(
    	function(results) {
        console.log("Getting data");
    		console.log(results.data);
        $scope.lifts = results.data;
    	},
    	function (error) {
    		console.log("error");
    	}
    );
  }

  $scope.get_lifts();
  console.log("Scope: " );
  console.log($scope.lifts);

});
