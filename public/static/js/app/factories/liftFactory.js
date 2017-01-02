/*
 * This service fetches data for the lifts available
 */

app.factory("liftFactory", ['$http', function ($http) {

  var liftFactory = {};

  liftFactory.get_lifts = function () {
    return $http.get('/api/lifts/');
  };

  liftFactory.get_lifts_description = function () {
    return $http.get('/api/lifts/desc');
  };

  return liftFactory;

}]);
