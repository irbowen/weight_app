
var app = angular.module('weightApp', ['ezfb', 'ngRoute']);

app.config(function (ezfbProvider, $routeProvider, $locationProvider) {
  
  $locationProvider.html5Mode(true);
 
  $routeProvider
    .when('/', {
      templateUrl: 'static/js/app/partials/home.html',
      controller: 'userController'
    })
    .when('/workout', {
      templateUrl : 'static/js/app/partials/add_workout.html',
      controller : 'workoutController'
    })
    .otherwise({
      redirectTo: '/'
    });

  ezfbProvider.setInitParams({
    appId: '943038155779971',
    version: 'v2.4'
  }); 


});
