var myApp = angular.module('myApp', []);

myApp.controller('mainController', function($scope, $http) {

$http.get("alumnos.php")
   .success(function (response) {
      $scope.alumnos = response.records;
      console.log($scope.alumnos);
   });
});



