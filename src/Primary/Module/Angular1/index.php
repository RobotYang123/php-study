<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angular1 study demo</title>

    <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
</head>
<body>

    <form ng-app="" name="myForm">
    Email:
        <input type="email" name="myAddress" ng-model="text">
        <span ng-show="myForm.myAddress.$error.email">不是一个合法的邮箱地址</span>
    </form>

    <p>在输入框中输入你的邮箱地址，如果不是一个合法的邮箱地址，会弹出提示信息。</p>

    </body>
</html>
-->



<!--
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://cdn.bootcss.com/angular.js/1.4.6/angular.min.js"></script>
</head>
<body>
<div ng-app="myApp">
    <div ng-controller="myCtrl_1">
        <h4>myCtrl_1：</h4>
        <div>$rootScope.name1：{{name1}}</div>
    </div>
    <div ng-controller="myCtrl_2">
        <h4>myCtrl_2：</h4>
        <div>$root.name1：{{$root.name1}} (From $root.name1)</div><br>
        <div>$scope.name1：{{name1}} ($rootScope.name1 is used by default when $scope.name1 is undefined in myCtrl_2：即未定义的变量，先在 scope 里找，没有找到则在 rootScope 查找, 都没有找到则输出空)</div><br>
        <div>$scope.name3：{{name3}} (From $rootScope.name1)</div>
        <div>$scope.name4：{{name4}} (From $scope.name1, So $scope eq $rootScope in the case：即从 scope 里找不到的变量，则从 rootScope中查找, 都没有找到则输出空)</div><br>
        <div>$scope.name6：{{rootName2}}</div>
    </div>
    <div ng-controller="myCtrl_3">
        <h4>myCtrl_3：</h4>
        <div>$scope.name5：{{name1}}</div>
        <div>$scope.name6：{{name6}}</div>
        <div>$scope.name7：{{name7}}</div>
    </div>
</div>
</body>
</html>

<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl_1', function($scope, $rootScope) {
        $rootScope.name1 = "myCtrl_1.rootScope.Name1";
    });
    app.controller('myCtrl_2', function($scope, $rootScope) {
        //$scope.name1 = 'myCtrl_2.scope.name1'; //Cancle defined myCtrl_2.scope.name
        $scope.name3 = $rootScope.name1;
        $scope.name4 = $scope.name1;
        $rootScope.name6 = 'myCtrl_2.rootScope.name6';
    });
    app.controller('myCtrl_3', function($scope, $rootScope) {
        $scope.name6 = $rootScope.name6;
        $scope.name7 = $scope.name7;
    });
</script>
-->



<script src="https://cdn.bootcss.com/angular.js/1.4.6/angular.min.js"></script>
<div ng-app="myApp" ng-controller="myCtrl as ctl">
    <div> newString: {{"jj" | myfilter:1:2:3:5}} </div>
</div>
<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
    });
    app.filter('myfilter', function() { //可以注入依赖
        return function(val) {
            var newArguments= Array.prototype.slice.call(arguments);
            return val+" & "+newArguments.join(',');
        }
    });
</script>
