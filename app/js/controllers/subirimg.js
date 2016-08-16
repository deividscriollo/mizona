var app = angular.module('dcapp');
app.controller('admin-subirimg-Ctrl', function($scope, $localStorage, $mdDialog, imagenes) {
  // var dataform = $localStorage.count.data;
  // empresa.get(dataform).then(function(data) {
  //     // console.log(data); //event res
  //     $scope.local = data;
  // });
  	$scope.uploadPic = function(file) {
	  	var dataform = {username: $scope.username, file: file, data: $localStorage.count.data, mode:'logo'};
	  	imagenes.update(dataform).then(function(data) {
	      // console.log(data); //event res
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
	};
	$scope.uploadgalleri = function(file) {
	  	var dataform = {description: $scope.description, file2: file, data: $localStorage.count.data, mode:'gallery'};
	  	imagenes.savegallery(dataform).then(function(data) {
	      // console.log(data); //event res
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
	};	
});