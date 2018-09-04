var app = angular.module('pandb', []);
app.controller('PrimerController', function($scope,$http) {
    $http.get("http://localhost/pandb/webservices/api/color.php")
    .then(function(response) {
            $scope.color = response.data.color;
            $scope.brillo = response.data.brillo;
            $scope.data = {
                availableOptions: [
                  {id: '1', name: 'Option A'},
                  {id: '2', name: 'Option B'},
                  {id: '3', name: 'Option C'}
                ],
                color: {id: '3', name: 'Option C'} //This sets the default value of the select in the ui
                };
    });
});