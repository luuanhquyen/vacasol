var vacasol = angular.module('vacasol', []);
vacasol.run(function ($rootScope) {
    $rootScope.input = true;
    $rootScope.finish = false;
    $rootScope.error = false;
    $rootScope.username = "";
})
vacasol.controller('input', function ($http, $rootScope, $scope) {
    $scope.input = {};
    $scope.error = {};
    $scope.sent={};
    $scope.init = function () {
        $scope.input.username = "";
        $scope.input.email = "";
    }
    $scope.finish = function (data) {
        if(data.status=="sent")
        {
            $rootScope.input = false;
            $rootScope.finish = true;
        }
        else
        {
            $rootScope.input = false;
            $rootScope.error = true;
        }
    }
    $scope.sendemail = function () {
        $scope.error = {};
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
            $http.jsonp('http://luuanhquyen.com:3000/'+'?callback=JSON_CALLBACK'+'&username=' + $scope.input.username + '&email=' + $scope.input.email + '').
                    success(function (data) {
                       $rootScope.username = $scope.input.username;
                       $scope.finish(data);
                    }).
                    error(function (data) {
                        $scope.finish({});
                    });
            
        }
    }
    
});

vacasol.controller('finish', function ($rootScope, $scope) {

});