<!doctype html>
<html lang="en" ng-app="viable" ng-controller="courier">
<head>
  <meta charset="UTF-8">
  <title>Example</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
        
<style>
	body { font: normal 13px/21px sans-serif; }
	.notice {  border-left: 6px solid; padding: 7px 11px; background-color: #fffbd9; border-color: #ffe70d; margin: 7px 0; font-size:12px; }
</style>  
  <script>
  (function(angular) {
  	
	'use strict';
  
	var viable = angular.module('viable', ['ngRoute']);
	
	viable.controller('courier', ['$scope','$http', '$location', '$rootScope', function($scope, $http, $location, $rootScope ) {
    	
		$scope.code = '';
		$scope.data = {};
		
		$scope.awb = function (item) {
			$http.get('api?code=' + $scope.code , $scope[item])
			.success ( function ( data, status, headers, config){
				$scope.data = data;
			});
		}
  	
	}])
	
	})(window.angular);

  
  </script>  
  
  
  
</head>
	<body>  
    
		<p>Viable AWB</p>
		<div ng-show="data.error" class="notice">{{data.error}}</div>
		<input type="text" ng-model="code"> <button ng-click="awb()">Find AWB</button>
		<div ng-show="data.code" class="notice">
            <p>Code: {{data.code}} from {{data.storage }}</p>
            <p>To: {{data.firstname}}</p>
            <p>Date: {{data.shipping_date}}</p>
        </div>
        


	</body>
</html>
