
var app = angular.module('myApp', ['ezfb']);

app.config(function (ezfbProvider) {
  ezfbProvider.setInitParams({
    appId: '943038155779971',
    version: 'v2.4'
  });  
});

app.controller('myController', function($scope, $http, ezfb) {
  $scope.msg = "Temp msg";

  function updateLoginStatus (more) {
    ezfb.getLoginStatus(function (res) {
      $scope.loginStatus = res;
      (more || angular.noop)();
    });
  }

  function updateMe () {
    ezfb.api('/me', function (res) {
      $scope.user = res;
      $scope.name = res.name;
      $scope.userid = res.id;
      createUser();
    });
  }

  function emptyMe () {
    $scope.user = null;
  }

 $scope.login = function () {
    ezfb.login(function (res) {
      if (res.authResponse) {
        updateLoginStatus(updateMe);
      }
    }, {'scope' : 'public_profile, email'});
  };

  function createUser() {
    console.log($scope);
    var data = {
      name : $scope.name,
      userid : $scope.userid
    };
    $http.post('/api/user', data).then(
      function(results) {
        console.log(results);
      },
      function(error) {
        console.log("error");
      }
    );
  }

  $scope.logout = function () {
    ezfb.logout(function () {
      updateLoginStatus(emptyMe);
    });
  };

  $scope.get_lifts = function() {
    $http.get('/api/lifts').then(
      function(results) {
        $scope.lifts = results.data;
      },
      function (error) {
        console.log("error");
      }
    );
  }

  $scope.get_lifts_description = function() {
    $http.get('/api/lifts/desc').then(
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


