var tabsAreas = angular.module('tabsAreas',[]);

tabsAreas.controller('TabsController',['$scope','TabsAreasService', '$compile', function($scope, TabsAreasService, $compile){
    $scope.periferies = '';
    $scope.periferiakesEnotites = '';
    $scope.dimoi = '';
    $scope.dratiriotites = '';

    loadData('', 'periferies');
    loadData('', 'periferiakes-enotites');
    loadData('', 'dimoi');
    loadData('', 'drastiriotites');

    $scope.getData = function(url) {
        var queryString = url.split('?'),
            path = queryString[0].split('/');

        loadData(queryString[1], path[path.length - 1]);
    }

    function loadData(qs, path) {
        if ( path == 'periferies' ) {
            loaddataPeriferies(qs);
        }

        if ( path == 'periferiakes-enotites' ) {
            loaddataPeriferiakesEnot(qs);
        }

        if ( path == 'dimoi' ) {
            loaddataDimoi(qs);
        }

        if ( path == 'drastiriotites' ) {
            loaddataDratiriotites(qs);
        }
    }

    function loaddataPeriferies(qs) {
        TabsAreasService.getPeriferies(qs)
        .then(function(response){
            $scope.periferies = response.data;
        },function(error){

        });
    }

    function loaddataPeriferiakesEnot(qs) {
        TabsAreasService.getPeriferiakesEnot(qs)
        .then(function(response){
            $scope.periferiakesEnotites = response.data;
        },function(error){

        });
    }

    function loaddataDimoi(qs) {
        TabsAreasService.getDimoi(qs)
        .then(function(response){
            $scope.dimoi = response.data;
        },function(error){

        });
    }

    function loaddataDratiriotites(qs) {
        TabsAreasService.getDrastiriotites(qs)
            .then(function(response){
                $scope.drastiriotites = response.data;
            },function(error){

            });
    }
}]);

tabsAreas.factory('TabsAreasService', ['$http', function($http){
    var tabsareas = {};

    tabsareas.getPeriferies = function (qs) {
        return $http({
                method: 'get',
                url: 'ajax/periferies?' + qs
            });
    };

    tabsareas.getPeriferiakesEnot = function (qs) {
        return $http({
            method: 'get',
            url: 'ajax/periferiakes-enotites?' + qs
        });
    };

    tabsareas.getPeriferiakesEnot = function (qs) {
        return $http({
            method: 'get',
            url: 'ajax/periferiakes-enotites?' + qs
        });
    };

    tabsareas.getDimoi = function (qs) {
        return $http({
            method: 'get',
            url: 'ajax/dimoi?' + qs
        });
    };

    tabsareas.getDrastiriotites = function (qs) {
        return $http({
            method: 'get',
            url: 'ajax/drastiriotites?' + qs
        });
    };

    return tabsareas;
}]);

tabsAreas.filter('to_trusted', ['$sce', function($sce){
    return function(text) {
        return $sce.trustAsHtml(text);
    };
}]);

tabsAreas.directive('compile', ['$compile', function ($compile) {
    return function(scope, element, attrs) {
        scope.$watch(
            function(scope) {
                // watch the 'compile' expression for changes
                return scope.$eval(attrs.compile);
            },
            function(value) {
                // when the 'compile' expression changes
                // assign it into the current DOM
                element.html(value);

                // compile the new DOM and link it to the current
                // scope.
                // NOTE: we only compile .childNodes so that
                // we don't get into infinite loop compiling ourselves
                $compile(element.contents())(scope);
            }
        );
    };
}]);