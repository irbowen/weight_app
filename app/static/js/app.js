
var app = angular.module('myApp', []);

app.controller('myController', function($scope, $http) {
  $scope.msg = "Sup, bruh?"  

  $scope.get_lifts = function() {
    $http.get('http://localhost:4000/api/lifts').then(
      function(results) {
        $scope.lifts = results.data;
      },
      function (error) {
        console.log("error");
      }
    );
  }

  $scope.get_lifts_description = function() {
    $http.get('http://localhost:4000/api/lifts/desc').then(
      function(results) {
        $scope.lifts_desc = results.data;
      },
      function (error) {
        console.log("error");
      }
    );
  }

  $scope.get_lifts();
  $scope.get_lifts_description();

});
