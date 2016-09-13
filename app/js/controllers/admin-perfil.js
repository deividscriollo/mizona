var app = angular.module('dcapp');
  
  app.controller('admin-perfil-Ctrl', function($scope, $mdDialog, empresa, categoria, empresa_categoria, $mdDialog, $mdMedia, $localStorage) {
    
    $scope.getdata = function(){
        var dataform = $localStorage.count.data;
        empresa.get(dataform).then(function(data) {
            // console.log(data); //event res
            $scope.data = data;
        });
    }
    // get data informacion general
    $scope.getdata();
    // actualizar informacion general
    $scope.form_info_gen = function(){
        $scope.local['propietario'] = $scope.data.propietario;
        $scope.local['nombre_comercial'] = $scope.data.nombre_comercial;
        $scope.data['id_empresa'] = $localStorage.count.data.empresa_id;
        var dataform = $scope.data;
        empresa.update(dataform).then(function(data) {
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

    $scope.getdatacategoria = function(){
        categoria.get().then(function(data) {
            // console.log(data); //event res
            $scope.toppings = data;
        });
    }
    $scope.getdatacategoria();

    $scope.form_categoria = function(){
        $scope.datacategoria['id_empresa'] = $localStorage.count.data.empresa_id;
        var dataform = $scope.datacategoria;
        empresa_categoria.nuevo(dataform).then(function(data) {
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

      $scope.selectedToppings = [];
      $scope.printSelectedToppings = function printSelectedToppings() {
        var numberOfToppings = this.selectedToppings.length;

        // If there is more than one topping, we add an 'and'
        // to be gramatically correct. If there are 3+ toppings
        // we also add an oxford comma.
        if (numberOfToppings > 1) {
          var needsOxfordComma = numberOfToppings > 2;
          var lastToppingConjunction = (needsOxfordComma ? ',' : '') + ' ademas ';
          var lastTopping = lastToppingConjunction +
              this.selectedToppings[this.selectedToppings.length - 1];
              console.log(lastTopping);
          return this.selectedToppings.slice(0, -1).join(', ') + lastTopping;
        }
        return this.selectedToppings.join('');
      };
});
app.controller('admin-map-Ctrl', function($scope, $mdDialog, categoria, $mdDialog, $mdMedia, $window, $localStorage) {

    $scope.window = $window.innerHeight-100;
	angular.extend($scope, {
	    center: {
	        lat: 0.3289248,
	        lng: -78.217455,
	        zoom: 15
	    },
	    defaults: {
            scrollWheelZoom: false
        },
        markers: {
    },
        events: {
            map: {
                enable: ['zoomstart', 'drag', 'click', 'mousemove'],
                logic: 'emit'
            }
        }
	});
    $scope.$on('leafletDirectiveMap.click', function(event, posicion){
        // $scope.eventDetected = "Click";
        $localStorage.selectmap =   {
                                        latitude:posicion.leafletEvent.latlng.lat,
                                        longitude:posicion.leafletEvent.latlng.lng
                                    };
        $scope.addMarkers(posicion);
        // console.log("Lat, Lon : " + posicion.leafletEvent.latlng.lat + ", " + posicion.leafletEvent.latlng.lng)
    });
    $scope.addMarkers = function(posicion) {
        angular.extend($scope, {
            markers: {
                m1: {
                    lat: posicion.leafletEvent.latlng.lat,
                    lng: posicion.leafletEvent.latlng.lng,
                    message: "Aqui se encuetra tu local "+$localStorage.count.data.nombre_comercial+". ?",
                }                
            }
        });
    };

			

	$scope.hide = function() {
	    $mdDialog.hide();
        console.log('hide');
    };
    $scope.cancel = function() {
        $mdDialog.cancel();
        console.log('cancel');
    };
    $scope.answer = function(answer) {
        $mdDialog.hide(answer);
    };
});


// $scope.getredes = function(){
//         var dataform = $localStorage.count.data;
//         social.get(dataform).then(function(data) {
//             // console.log(data); //event res
//             $scope.redes = data;
//         });
//     }
//     // get data redes sociales
//     $scope.getredes();    

//     $scope.registroredes = function(){
//         var dataform = $scope.redes;
//         social.update(dataform).then(function(data) {
//             // console.log(data); //event res
//             $scope.getredes();
//             if (data.result) {
//                 $mdDialog.show(
//                     $mdDialog.alert()
//                     .parent(angular.element(document.querySelector('#popupContainer')))
//                     .clickOutsideToClose(true)
//                     .title('En hora Buena')
//                     .textContent('Su informacion se actualizo correctamente')
//                     .ariaLabel('Alert Dialog Demo')
//                     .ok('Entendido')
//                 );
//             } else {
//                 $mdDialog.show(
//                     $mdDialog.alert()
//                     .parent(angular.element(document.querySelector('#popupContainer')))
//                     .clickOutsideToClose(true)
//                     .title('Lo sentimos')
//                     .textContent('Intente mas tarde :(')
//                     .ariaLabel('Alert Dialog Demo')
//                     .ok('Entendido')
//                 );
//             }
//         });
//     }

//     $scope.getlocal = function(){
//         var dataform = $localStorage.count.data;
//         localizacion.get(dataform).then(function(data) {
//             // console.log(data); //event res
//             $scope.local = data;
//         });
//     }
//     $scope.getlocal();
//     $scope.reglocalizacion = function(){
//         var dataform = $scope.local;
//         localizacion.update(dataform).then(function(data) {
//             // console.log(data); //event res
//             if (data.result) {
//                 $mdDialog.show(
//                     $mdDialog.alert()
//                     .parent(angular.element(document.querySelector('#popupContainer')))
//                     .clickOutsideToClose(true)
//                     .title('En hora Buena')
//                     .textContent('Su informacion se actualizo correctamente')
//                     .ariaLabel('Alert Dialog Demo')
//                     .ok('Entendido')
//                 );
//             } else {
//                 $mdDialog.show(
//                     $mdDialog.alert()
//                     .parent(angular.element(document.querySelector('#popupContainer')))
//                     .clickOutsideToClose(true)
//                     .title('Lo sentimos')
//                     .textContent('Intente mas tarde :(')
//                     .ariaLabel('Alert Dialog Demo')
//                     .ok('Entendido')
//                 );
//             }
//         });
//     }
    

//     $scope.mapmodal = function(){
//         console.log('test');
//         var useFullScreen = ($mdMedia('sm') || $mdMedia('xs'))  && $scope.customFullscreen;
//             $mdDialog.show({
//               controller: 'admin-map-Ctrl',
//               templateUrl: 'view/admin/map.html',
//               parent: angular.element(document.body),
//               // targetEvent: ev,
//               clickOutsideToClose:false,
//               fullscreen: useFullScreen
//             }).then(function() {
//               console.log($localStorage.selectmap);
//               $scope.local.latitude = $localStorage.selectmap.latitude
//               $scope.local.longitude = $localStorage.selectmap.longitude
//               $scope.local.map = 'Mapa seleccionado';
//                console.log($scope.local);
//             }); 
//     }
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(function (position) {

//                 mysrclat = position.coords.latitude; 
//                 mysrclong = position.coords.longitude;
//                 console.log(mysrclat);
//                 console.log(mysrclong);
//         });
//     }