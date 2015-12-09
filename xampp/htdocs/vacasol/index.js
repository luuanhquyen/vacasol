var vacasol = angular.module('vacasol', []);
vacasol.run(function ($rootScope) {
    $rootScope.input = true;
    $rootScope.finish = false;
    $rootScope.username = "";
})
vacasol.controller('input', function ($http, $rootScope, $scope) {
    $scope.input = {};
    $scope.error = {};
    $scope.init = function () {
        $scope.input.username = "";
        $scope.input.email = "";
    }
    $scope.sendemail = function () {
        $scope.error = {};
        console.log($scope.input);
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test($scope.input.email))
        {
            $scope.error.email = "Please enter a valid email address";
        }
        if ($scope.input.username.length < 1)
        {
            $scope.error.username = "Please enter your username";
        }
        if (Object.keys($scope.error).length === 0)
        {
            $rootScope.input = $scope.input;
            $http.jsonp('http://luuanhquyen.com:3000/?username=' + $scope.input.username + '&email=' + $scope.input.email + '').
                    success(function (data) {
                    }).
                    error(function (data) {
                    });
            $rootScope.input = false;
            $rootScope.finish = true;
            $rootScope.username = $scope.input.username;
        }
    }
});
vacasol.controller('finish', function ($rootScope, $scope) {

});