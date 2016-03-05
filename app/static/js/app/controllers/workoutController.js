app.controller('workoutController', 
  function($scope, $http, ezfb, liftFactory) {

  getLifts();

  function getLifts() {
    liftFactory.get_lifts().then(
      function (results) {
        $scope.lifts = results.data;
      },
      function (error) {
        console.log("Error");
      }
    );
  }

  $scope.verifyData = function (data) {
    var errors = [];
    if (data.weight <= 0) {
      errors.push("Weight must be greater than zero.");
    }
    if (data.reps <= 0) {
      errors.push("Reps must be greater than zero.");
    }
    if (data.sets <= 0) {
      errors.push("Sets must be greater than zero.");
    }
    console.log(errors);
    if (errors.length > 0) {
      errors.push("Please fix the errors listed.");
      return false;
    }
    return true;
  };

  $scope.submit_workout = function () {

    var data = {
      userid : $scope.userid,
      date : $scope.date,
      short_name : $scope.lift_name,
      weight : $scope.weight,
      reps : $scope.reps,
      sets : $scope.sets,
      notes : $scope.notes
    };

    if ($scope.verifyData(data)) {
      console.log(data);
      $http.post('/api/workout/add', data).then(
        function (results) {
          console.log("Workout posted!");
        },
        function (error) {
          console.log(error);
        }
      );
    }

  };

});