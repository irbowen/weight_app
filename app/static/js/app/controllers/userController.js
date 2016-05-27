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
      $scope.user_id = res.id;
      createUser();
      sessionLogin();
      getLiftData();
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
      user_id : $scope.user_id
    };
    $http.post('/api/user', data).then(
      function(results) {
        console.log($scope.user_id);
        console.log("User create succesful!");
      },
      function(error) {
        console.log("error");
      }
    );
  }

  function sessionLogin() {
    $http.post('/api/login', { user_id : $scope.user_id }).then(
      function (results) {
        console.log("Login succesful!");
      },
      function (error) {
        console.log("err");
      }
    );
  }

  function getLiftData() {
    $http.get('/api/workouts/recent').then(
      function (results) {
        $scope.best_lift = results.data.best_lift;
        $scope.recent_lift = results.data.recent_lift;
      },
      function (error) {
        console.log("Errorrrr");
      }
    );
  }

  $scope.logout = function () {
    ezfb.logout(function () {
      updateLoginStatus(emptyMe);
    });
  };

});


