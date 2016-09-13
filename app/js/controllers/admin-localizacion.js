var app = angular.module('dcapp');

	app.controller('localizacion-Ctrl', function($scope, $mdDialog, $localStorage, localizacion, $mdMedia) {
		$scope.getlocal = function(){
        var dataform = $localStorage.count.data;
        localizacion.get(dataform).then(function(data) {
            // console.log(data); //event res
            $scope.data = data;
        });
    }
    $scope.getlocal();
    $scope.reglocalizacion = function(){
        var dataform = $scope.data;
        localizacion.update(dataform).then(function(data) {
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
    }
    

    $scope.mapmodal = function(){
        console.log('test');
        var useFullScreen = ($mdMedia('sm') || $mdMedia('xs'))  && $scope.customFullscreen;
            $mdDialog.show({
              controller: 'admin-map-Ctrl',
              templateUrl: 'view/admin/map.html',
              parent: angular.element(document.body),
              // targetEvent: ev,
              clickOutsideToClose:false,
              fullscreen: useFullScreen
            }).then(function() {
              // console.log($localStorage.selectmap);
              $scope.local.latitude = $localStorage.selectmap.latitude
              $scope.local.longitude = $localStorage.selectmap.longitude
              $scope.local.map = 'Mapa seleccionado';
               // console.log($scope.local);
            }); 
    }
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

                mysrclat = position.coords.latitude; 
                mysrclong = position.coords.longitude;
                // console.log(mysrclat);
                // console.log(mysrclong);
        });
    }
	});