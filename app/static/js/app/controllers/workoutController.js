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

  $scope.submit_workout = function () {
    console.log("Adding a workout");
    var data = {
      name : $scope.name,
      userid : $scope.userid,
      date : $scope.date,
      weight : $scope.weight
    };
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

});