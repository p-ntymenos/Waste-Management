
'use strict';



var gorillaApp = angular.module('gorillaApp',[],function($interpolateProvider){

    $interpolateProvider.startSymbol('{!');
    $interpolateProvider.endSymbol('!}');

}).filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
})
.filter('pIf', function() {
    return function(input,state,outvalueTrue,outvalueFalse) {
        //console.log("type of state is: "+ state +" and type of input is "+input);
        //if(input === state){
        if(input == state){
            return outvalueTrue;
        }else{
            return outvalueFalse;
        }
    };
})
;

gorillaApp.controller('gorillaRegionsCtrl', ['$scope', '$http',  function ($scope, $http ) {

    $scope.regions = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 5;

    $scope.setPage = function(val){
        $scope.currentPage = val;
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'/ajax/regions/'+chosenYear,{ cache: true}).success(function(data){
        $scope.regions = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.regions.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaSubRegionsCtrl', ['$scope', '$http',  function ($scope, $http ) {

    $scope.regions = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 5;

    $scope.setPage = function(val){
        $scope.currentPage = val;
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'/ajax/subregions/'+chosenYear,{ cache: true}).success(function(data){
        $scope.regions = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.regions.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillamunicipalitiesCtrl', ['$scope', '$http',  function ($scope, $http ) {

    $scope.regions = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 5;
    $scope.setPage = function(val){
        $scope.currentPage = val;
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'/ajax/municipalities/'+chosenYear,{ cache: true}).success(function(data){
        $scope.regions = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.regions.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaProducersCtrl', ['$scope', '$http',  function ($scope, $http ) {

    $scope.regions = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 5;
    $scope.setPage = function(val){
        $scope.currentPage = val;
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'/ajax/producers/'+chosenYear,{ cache: true}).success(function(data){
        $scope.regions = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.regions.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaProducersActivityCtrl', ['$scope', '$http',  function ($scope, $http ) {

    $scope.regions = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 5;
    $scope.setPage = function(val){
        $scope.currentPage = val;
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'/ajax/producersactivity/'+chosenYear,{ cache: true}).success(function(data){
        $scope.regions = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.regions.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaRegionsSumsCtr', ['$scope', '$http',  function ($scope, $http ) {


    $scope.changeOrder = function(order){
        if($scope.order_ != order){
            $scope.order_ = order;
            $scope.orderDir = false;    
        }else{
            $scope.orderDir = !$scope.orderDir;    
        }
    }

    $scope.pageSizeChange = function(){
        $scope.pageSize = $scope.queryPages;
    }

    $scope.order_ = 'qty';
    $scope.orderDir = true;
    $scope.regions = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 20;
    $scope.setPage = function(flag){
        if($scope.numberOfPages() == 1)return false;
        var numOfPages = Math.ceil($scope.regions.length/$scope.pageSize);
        if(flag === true && ($scope.currentPage+1)< numOfPages){
            $scope.currentPage = $scope.currentPage+1;
        }else if(flag === false && $scope.currentPage>0){
            $scope.currentPage = $scope.currentPage-1;
        }else{
            return false;
        }
    }
    var chosenYear = $('#searchYear').val();
    var id = 0;
    if($('#rId').val())id = $('#rId').val();
    
    $http.get(basePath+'regions/ajax/'+chosenYear+'?id='+id,{ cache: true}).success(function(data){
        $scope.regions = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.regions.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaSubRegionsSumsCtr', ['$scope', '$http',  function ($scope, $http ) {


    $scope.changeOrder = function(order){
        if($scope.order_ != order){
            $scope.order_ = order;
            $scope.orderDir = false;    
        }else{
            $scope.orderDir = !$scope.orderDir;    
        }
    }

    $scope.pageSizeChange = function(){
        $scope.pageSize = $scope.queryPages;
    }

    $scope.order_ = 'qty';
    $scope.orderDir = true;
    $scope.rows = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 20;
    $scope.setPage = function(flag){
        if($scope.numberOfPages() == 1)return false;
        var numOfPages = Math.ceil($scope.rows.length/$scope.pageSize);
        if(flag === true && ($scope.currentPage+1)< numOfPages){
            $scope.currentPage = $scope.currentPage+1;
        }else if(flag === false && $scope.currentPage>0){
            $scope.currentPage = $scope.currentPage-1;
        }else{
            return false;
        }
    }
    var chosenYear = $('#searchYear').val();
    var id = 0;
    if($('#rId').val())id = $('#rId').val();
    
    
    $http.get(basePath+'subregions/ajax/'+chosenYear+'?id='+id,{ cache: true}).success(function(data){
        $scope.rows = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.rows.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaMunicipalitiesCtr', ['$scope', '$http',  function ($scope, $http ) {


    $scope.changeOrder = function(order){
        if($scope.order_ != order){
            $scope.order_ = order;
            $scope.orderDir = false;    
        }else{
            $scope.orderDir = !$scope.orderDir;    
        }
    }

    $scope.pageSizeChange = function(){
        $scope.pageSize = $scope.queryPages;
    }

    $scope.order_ = 'qty';
    $scope.orderDir = true;
    $scope.rows = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 20;
    $scope.setPage = function(flag){
        if($scope.numberOfPages() == 1)return false;
        var numOfPages = Math.ceil($scope.rows.length/$scope.pageSize);
        if(flag === true && ($scope.currentPage+1)< numOfPages){
            $scope.currentPage = $scope.currentPage+1;
        }else if(flag === false && $scope.currentPage>0){
            $scope.currentPage = $scope.currentPage-1;
        }else{
            return false;
        }
    }
    var chosenYear = $('#searchYear').val();
    var id,perrId = 0;
    if($('#rId').val())id = $('#rId').val();
    if($('#perrId').val())perrId = $('#perrId').val();
    $http.get(basePath+'municipalities/ajax/'+chosenYear+'?id='+id+'&perrId='+perrId,{ cache: true}).success(function(data){
        $scope.rows = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.rows.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaProducersActivityCtr', ['$scope', '$http',  function ($scope, $http ) {


    $scope.changeOrder = function(order){
        if($scope.order_ != order){
            $scope.order_ = order;
            $scope.orderDir = false;    
        }else{
            $scope.orderDir = !$scope.orderDir;    
        }
    }

    $scope.pageSizeChange = function(){
        $scope.pageSize = $scope.queryPages;
    }

    $scope.order_ = 'qty';
    $scope.orderDir = true;
    $scope.rows = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 20;
    $scope.setPage = function(flag){
        if($scope.numberOfPages() == 1)return false;
        var numOfPages = Math.ceil($scope.rows.length/$scope.pageSize);
        if(flag === true && ($scope.currentPage+1)< numOfPages){
            $scope.currentPage = $scope.currentPage+1;
        }else if(flag === false && $scope.currentPage>0){
            $scope.currentPage = $scope.currentPage-1;
        }else{
            return false;
        }
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'ajax/producersActivity/'+chosenYear,{ cache: true}).success(function(data){
        $scope.rows = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.rows.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);

gorillaApp.controller('gorillaRoutesCtr', ['$scope', '$http',  function ($scope, $http ) {


    $scope.changeOrder = function(order){
        if($scope.order_ != order){
            $scope.order_ = order;
            $scope.orderDir = false;    
        }else{
            $scope.orderDir = !$scope.orderDir;    
        }
    }

    $scope.pageSizeChange = function(){
        $scope.pageSize = $scope.queryPages;
    }

    $scope.order_ = 'qty';
    $scope.orderDir = true;
    $scope.rows = [];
    basePath = '/gorillaApp/public/';
    $scope.currentPage = 0;
    $scope.pageSize = 20;
    $scope.setPage = function(flag){
        if($scope.numberOfPages() == 1)return false;
        var numOfPages = Math.ceil($scope.rows.length/$scope.pageSize);
        if(flag === true && ($scope.currentPage+1)< numOfPages){
            $scope.currentPage = $scope.currentPage+1;
        }else if(flag === false && $scope.currentPage>0){
            $scope.currentPage = $scope.currentPage-1;
        }else{
            return false;
        }
    }
    var chosenYear = $('#searchYear').val();
    $http.get(basePath+'ajax/routes/'+chosenYear,{ cache: true}).success(function(data){
        $scope.rows = data;
        $scope.numberOfPages = function(){  return Math.ceil($scope.rows.length/$scope.pageSize); }
        $scope.numberOfPagesBtns = [];
        for(var k=0;k< $scope.numberOfPages(); k++){
            $scope.numberOfPagesBtns.push(k+1);
        }
    });

}]);




























