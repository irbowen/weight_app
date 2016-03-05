
var app = angular.module('myApp', ['ezfb']);

app.config(function (ezfbProvider) {
  ezfbProvider.setInitParams({
    appId: '943038155779971',
    version: 'v2.4'
  });  
});
