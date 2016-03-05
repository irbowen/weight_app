/*
 * Handle all of the login, logout, account creation and deletion
 */

app.controller('userController', 
  function($scope, $http, ezfb) {

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
    var data = {
      name : $scope.name,
      userid : $scope.userid
    };
    $http.post('/api/user', data).then(
      function(results) {
        console.log("Results from user create: ")
        console.log(results.data);
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

});


