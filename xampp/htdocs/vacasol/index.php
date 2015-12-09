<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="/index.js"></script>
    </head>
    <body ng-app="vacasol">
        <div class="row" style="margin-top: 100px;">
            <div class="col-lg-4"></div>
                <div class="col-lg-4" ng-controller="input" ng-show="$root.input" ng-init="init()">
                    <form>
                        <strong>Vacasol test - Luu Anh Quyen<strong>
                        <br />
                        <div class="form-group">
                            <label for="username">Username*:</label>
                            <input placeholder="John" ng-model="input.username" type="text" class="form-control" id="username">
                            <p class="text-danger" ng-bind="error.username"></p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email*:</label>
                            <input placeholder="John@doe.com" ng-model="input.email" type="text" class="form-control" id="email">
                            <p class="text-danger" ng-bind="error.email"></p>
                        </div>
                        <button class="btn btn-primary pull-right" ng-click="sendemail()">Send</button>
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