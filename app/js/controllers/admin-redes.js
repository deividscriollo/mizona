var app = angular.module('dcapp');
  
  app.controller('redes-Ctrl', function($scope, $mdDialog, $localStorage, social) {
    
	$scope.getredes = function(){
	        var dataform = $localStorage.count.data;
	        social.get(dataform).then(function(data) {
	            // console.log(data); //event res
	            $scope.redes = data;
	        });
	    }
	    // get data redes sociales
	    $scope.getredes();    

	    $scope.registroredes = function(){
	        var dataform = $scope.redes;
	        social.update(dataform).then(function(data) {
	            // console.log(data); //event res
	            $scope.getredes();
	            if (data.result) {
	                $mdDialog.show(
	                    $mdDialog.alert()
	                    .parent(angular.element(document.querySelector('#popupContainer')))
	                    .clickOutsideToClose(true)
	                    .title('En hora Buena')
	                    .textContent('Su informacion se actualizo correctamente')
	                    .ariaLabel('Alert Dialog Demo')
	                    .ok('Entendido')
	                );
	            } else {
	                $mdDialog.show(
	                    $mdDialog.alert()
	                    .parent(angular.element(document.querySelector('#popupContainer')))
	                    .clickOutsideToClose(true)
	                    .title('Lo sentimos')
	                    .textContent('Intente mas tarde :(')
	                    .ariaLabel('Alert Dialog Demo')
	                    .ok('Entendido')
	                );
	            }
	        });
	    }
  });