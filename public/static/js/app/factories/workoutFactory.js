/*
 * This service fetches data for the workouts available
 */

app.factory("workoutFactory", ['$http', function ($http) {

  var workoutFactory = {};

  workoutFactory.get_lifts = function () {
    return $http.get('/api/lifts');
  };

  workoutFactory.get_recent_workouts = function () {
    return $http.get('/api/workouts/recent/');
  };

  workoutFactory.get_all_workouts = function (user_id) {
    return $http.get('/api/workouts/all/');
  };

  return workoutFactory;

}]);
