var App = angular.module('app', ['ngRoute']);
App.config(function ($httpProvider) {
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
});

App.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/login', {
                templateUrl: '/public/template/login.php',
                controller: 'LoginCtrl'
            }).
            when('/register', {
                templateUrl: '/public/template/register.php',
                controller: 'RegisterCtrl'
            }).
            when('/chat', {
                templateUrl: '/public/template/chat.php',
                controller: 'ChatCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
App.controller('MainCtrl', function ($scope, $http) {

    $scope.destroy_session = function () {
        var request = $http({
            method: "post",
            url: "processing/destroy.php",
            data: ""

        });
        request.success(function (data) {
            $scope.massage_session = "Message:" + data;
            location.reload();
        });
        request.error(function (error) {
            console.log(error);
        });
    }

});
App.controller('LoginCtrl', function ($scope, $http, $route) {
    $scope.login = function () {
        $scope.massage = "";
        var request = $http({
            method: "post",
            url: "processing/login.php",
            data: {
                username: $scope.username,
                password: $scope.password,
                captcha: $scope.captcha
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });

        /* Check whether the HTTP Request is successful or not. */
        request.success(function (data) {
            if (data[0].session == "yes") {
                location.reload();
            } else $scope.massage_login = "Message: " + data;
        });
        request.error(function (error) {
            console.log(error);
        });
    }

});
App.controller('RegisterCtrl', function ($scope, $http) {

    $scope.register = function () {
        $scope.massage = "";
        var request = $http({
            method: "post",
            url: "processing/register.php",
            data: {
                username: $scope.username,
                password: $scope.password,
                password1: $scope.password1,
                email: $scope.email,
                captcha: $scope.captcha

            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });

        /* Check whether the HTTP Request is successful or not. */
        request.success(function (data) {
            if (data[0].session == "yes") {
                location.reload();
            } else $scope.massage_reg = "Message: " + data;
        });
        request.error(function (error) {
            console.log(error);
        });
    }

});
App.controller('ChatCtrl', function ($scope, $http, $interval, $anchorScroll, $location) {
    update_msg();
    $scope.edit = false;
    $scope.edit_msg_g = function ($id, $index) {
        if ($scope.edit == false) {
            $scope.edit_msg_id = $id;
            $scope.edit_msg_index = $index;
            $scope.edit = true;
        } else {
            $scope.edit = false;
        }

    }
    $scope.edit_msg = function () {
        $scope.massage = "";
        var request = $http({
            method: "post",
            url: "processing/edit_msg.php",
            data: {
                id: $scope.edit_msg_id,
                msg: $scope.edit_msg_text
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });

        /* Check whether the HTTP Request is successful or not. */
        request.success(function (data) {
            $scope.massage_msg = "Message: " + data;
            update_msg();
            $scope.edit_msg_text = "";
            $scope.edit = false;

        });
        request.error(function (error) {
            console.log(error);
        });
    }
    function update_msg() {

        var request = $http({
            method: "post",
            url: "processing/all_msg.php",
            data: "",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });

        /* Check whether the HTTP Request is successful or not. */
        request.success(function (data) {
            $scope.chat_data = data;
        });
        request.error(function (error) {
            console.log(error);
        });
    }

    $interval(update_msg, 1000);
    var req = $http({
        method: "post",
        url: "processing/session.php",
        data: "",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    });
    /* Check whether the HTTP Request is successful or not. */
    req.success(function (data) {
        $scope.sesion_login = data;
    });
    req.error(function (error) {
        console.log(error);
    });

    $scope.send_msg = function () {

        $scope.massage = "";
        var request = $http({
            method: "post",
            url: "processing/chat.php",
            data: {
                login: $scope.sesion_login,
                msg: $scope.msg
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });

        /* Check whether the HTTP Request is successful or not. */
        request.success(function (data) {
            $scope.massage_msg = "Message: " + data;
            update_msg();
            $scope.msg = "";
        });
        request.error(function (error) {
            console.log(error);
        });
    }
    $scope.delete_msg = function ($id) {
        $scope.massage = "";
        var request = $http({
            method: "post",
            url: "processing/delete_msg.php",
            data: {
                login: $scope.sesion_login,
                id: $id
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });

        /* Check whether the HTTP Request is successful or not. */
        request.success(function (data) {
            update_msg();
            $location.hash('bottom');

            $anchorScroll();
        });
        request.error(function (error) {
            console.log(error);
        });
    }
});