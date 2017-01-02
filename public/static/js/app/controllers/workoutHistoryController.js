/*
 * Controller for workout history
 */

app.controller('workoutHistoryController', 
  function($scope, $http, liftFactory, workoutFactory) {

  workoutFactory.get_all_workouts($scope.user_id).then(
    function (results) {
      $scope.all_workouts = results.data;
    }
  );
  

});
