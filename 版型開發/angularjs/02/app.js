const app = angular.module('myApp',['ngRoute']);
app.controller('myConctrl',['$scope','$route',function($scope,$route){
    $scope.$route=$route;
    $scope.content='hello';
    $scope.aboutData=[
        {
            content:1,
            status:false
        },
        {
            content:2,
            status:false
        },
        {
            content:3,
            status:false
        },
        {
            content:4,
            status:false
        },
        {
            content:5,
            status:false
        }
    ]
}]);
app.config(['$routeProvider',function ($routeProvider) {
    $routeProvider.
    when('/', {
        templateUrl: 'home.html'
    })
    .when('/about', {
        templateUrl: 'about.html'
    })
    .when('/li', {
        templateUrl: 'li.html'
    })
}]);    