<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="/index.js"></script>
        <style>
        .spinner{
            position:fixed;
            z-index:99;/* make higher than whatever is on the page */
            top:0;
            left:0;
            right:0;
            bottom:0;
            margin:auto;
            width:100%;
            height:100%;
            text-align: center;
            vertical-align: middle;
            padding-top: 100px;
            background-color:rgba(0, 0, 0, 0.35);
        }
        </style>
    </head>
    <body ng-app="vacasol">
        <div class="spinner" ng-show="$root.processing"><img src="/spin.gif" width="100px"></div>
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
                <div class="col-lg-4" ng-controller="finish" ng-show="$root.error" >
                    We are sorry <span ng-bind="$root.username"></span><br />
                    There is a problem while sending the email. You can try again by refresh the browser.
                </div>
            <div class="col-lg-4"></div>
        </div>
    </body>
</html>