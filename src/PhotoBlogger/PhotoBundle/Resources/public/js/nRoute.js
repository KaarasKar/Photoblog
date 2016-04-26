
var origin = document.location.origin;
var folder = document.location.pathname.split('/')[1];

var path = origin + "/" + folder + "/bundles/photobloggerphoto/js/";

var blogApp = angular.module('blog',['ngRoute','ngResource']);

blogApp.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: path+ 'index.html.twig',
            controller: 'IndexAction'
        }).
        when('/login', {
            templateUrl: path+ 'login.html.twig',
            controller: 'LoginActions'
        }).
        when('/register', {
            templateUrl: path+ 'register.html.twig',
            controller: 'RegisterActions'
        }).
        otherwise({
            redirectTo: '/'
        });
}]);
