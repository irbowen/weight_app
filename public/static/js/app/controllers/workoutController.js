
/* This should probably be renamed to something like
   'addWorkoutController' */

app.controller('workoutController', function($scope, $http, liftFactory) {

  // Load the available lifts into the dropdown menu
  getLifts();

  // If the function succedes, load the lift data into scope so that the
  // view will be update with the lifts
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

  // More verification here TODO
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
      user_id : $scope.user_id,
      date : $scope.date,
      short_name : $scope.lift_name,
      weight : $scope.weight,
      reps : $scope.reps,
      sets : $scope.sets,
      notes : $scope.notes
    };

    if ($scope.verifyData(data)) {
      console.log(data);
      $http.post('/api/workout/add/', data).then(
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
