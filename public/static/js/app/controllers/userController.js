/*
 * Handle all of the login, logout, account creation and deletion
 */

app.controller('userController',
    function($scope, $http, ezfb) {

      /* High level login function. Get's your public profile
         and email from facebook, and if authorized, log in. */
      $scope.login = function () {
        ezfb.login(function (res) {
          if (res.authResponse) {
            updateLoginStatus(updateMe);
            createUserAndLogin();
          }
          else {
            console.log("error");
          }
        }, {'scope' : 'public_profile, email'});
      };

      $scope.logout = function () {
        ezfb.logout(function () {
          updateLoginStatus(emptyMe);
        });
      };

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
        });
      }

      function emptyMe () {
        $scope.user = null;
      }

      function createUserAndLogin() {
        var data = {
          name : $scope.name,
          user_id : $scope.user_id
        };
        $http.post('/api/login/', data).then(
            function(results) {
              console.log(results);
              console.log($scope.user_id);
              console.log($scope.name);
              console.log("User login/create succesful!");
            getLiftData();
            },
            function(error) {
              console.log("error");
              console.log(error);
            });
      }

      function getLiftData() {
        $http.get('/api/workouts/max/').then(
            function (results) {
              console.log(results.data);
              $scope.best_lift = results.data.best_lift;
            },
            function (error) {
              console.log("Errorrrr");
            });
      }


    });


