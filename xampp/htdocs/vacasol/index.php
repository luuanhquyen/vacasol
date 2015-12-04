<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    </head>
    <body  ng-app="vacasol">

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" ng-controller="input" ng-show="$root.input" ng-init="init()">
                <form>
                    <strong>Vacasol test - Luu Anh Quyen<strong>
                            <br />
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input ng-model="input.username" type="text" class="form-control" id="username">
                                <p class="text-danger" ng-bind="error.username"></p>
                            </div>
                            <div class="form-group">
                                <label for="email">Password:</label>
                                <input ng-model="input.email" type="text" class="form-control" id="email">
                                <p class="text-danger" ng-bind="error.email"></p>
                            </div>
                            <button class="btn-success" ng-click="sendemail()">Send</button>
                            </form>
                            </div>
                            <div class="col-lg-4" ng-controller="finish" ng-show="$root.finish" >
                                Stay tuned <span ng-bind="$root.username"></span><br />
                                You have been signed up!
                            </div>
                            <div class="col-lg-4"></div>

                            </div>

                            </body>
                            </html>

                            <script>
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
                                            $rootScope.input=$scope.input;
                                            $http.jsonp('http://vacasol.iskun.net:3000/?username=' + $scope.input.username + '&email=' + $scope.input.email + '').
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
                            </script>