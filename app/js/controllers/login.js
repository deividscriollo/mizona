var app = angular.module('dcapp');

app.controller('LoginCtrl', function($scope, $mdDialog, empresa, session, blockUI, $location) {
    // cod    
    $scope.menu = [ 
                    { title: 'Inicio', icon: 'home', link: '#/Administrador'},
                    { link : '', title: 'Perfil', icon: 'perm_contact_calendar', link: '#/Administrador/Perfil'},
                    { title: 'Perfil Imagenes', icon: 'aspect_ratio', link: '#/Administrador/Subir_Imagenes'},
                    { title: 'Publicacion Imagenes', icon: 'wallpaper', link: '#/Administrador/Subir_Imagenes'},
                    { title: 'Mapa', icon: 'place', link: '#/Administrador/Mapa-VistaPrevia'}
                  ];

    $scope.inisession = function() {
        var dataform = $scope.ini;
        session.iniciar(dataform).then(function(data) {
            // console.log(data); //event res
            if (data.result) {
                $location.path('/Admin');
                console.log('test');
            } else {
                $mdDialog.show(
                    $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title('Lo sentimos')
                    .textContent('correo o password incorrectos, intente nuevamente :(')
                    .ariaLabel('Alert Dialog Demo')
                    .ok('Entendido')
                );
            }
        });
    }
    $scope.registrar = function() {
        var dataform = $scope.dreg;
        empresa.nuevo(dataform).then(function(data) {
            // console.log(data); //event res
            if (data.result) {
                $mdDialog.show(
                    $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title('Buen Trabajo')
                    .textContent('Revise su correo para activar su cuenta')
                    .ariaLabel('Alert Dialog Demo')
                    .ok('Entendido')
                );
            } else {
                $mdDialog.show(
                    $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title('Lo sentimos')
                    .textContent('Intente mas Tarde :(')
                    .ariaLabel('Alert Dialog Demo')
                    .ok('Entendido')
                );
            }
            $scope.dreg = {}
            $scope.newreg.$setPristine();
        });
    }

    $scope.recuperarpass = function(){
    	var dataform = $scope.drecuperarpass;
    	empresa.recuperarpass(dataform).then(function(data) {
    		console.log(data);
    	});
    	$scope.drecuperarpass = {}
    	$scope.formrecu.$setPristine();
    }
});

app.controller('Active-count-Ctrl', function($mdDialog,  $routeSegment, $location, empresa) {
	empresa.activar_cuenta($routeSegment.$routeParams).then(function(data) {
		if (data.result) {
            $mdDialog.show(
                $mdDialog.alert()
                .parent(angular.element(document.querySelector('#popupContainer')))
                .clickOutsideToClose(true)
                .title('Buen Trabajo')
                .textContent('Su cuenta se activado correctamente')
                .ariaLabel('Alert Dialog Demo')
                .ok('Iniciar Sesion')
            ).finally(function() {
	          $location.path('/Login')
	        });
            
        } else {
            $mdDialog.show(
                $mdDialog.alert()
                .parent(angular.element(document.querySelector('#popupContainer')))
                .clickOutsideToClose(true)
                .title('Lo sentimos')
                .textContent('Intente mas Tarde :(')
                .ariaLabel('Alert Dialog Demo')
                .ok('Entendido')
            ).finally(function() {
	          $location.path('/Login')
	        });
        }
	});
});

app.controller('Recuperar-pass-Ctrl', function($scope, $mdDialog,  $routeSegment, $location, empresa) {
	$mdDialog.show({
		controller: 'update-pass-Ctrl',
		templateUrl: 'view/updatepass.html',
		parent: angular.element(document.body),
		clickOutsideToClose:false,
		locals: {
       		items: $routeSegment.$routeParams
     	}
    });
});
app.controller('update-pass-Ctrl', function($scope, $mdDialog,  $routeSegment, $location, empresa, items) {
	$scope.passupdate = function(){
		$scope.newpass['id'] = items.id;
		var dataform = $scope.newpass;
    	empresa.newpass(dataform).then(function(data) {
    		// console.log(data);
    		if (data.result) {
	            $mdDialog.show(
	                $mdDialog.alert()
	                .parent(angular.element(document.querySelector('#popupContainer')))
	                .clickOutsideToClose(true)
	                .title('Buen Trabajo')
	                .textContent('Su nuevo password se actualizado correctamente')
	                .ariaLabel('Alert Dialog Demo')
	                .ok('Iniciar Sesion')
	            ).finally(function() {
		          $mdDialog.hide();
		          $location.path('/Login')
		        });
	        } else {
	            $mdDialog.show(
	                $mdDialog.alert()
	                .parent(angular.element(document.querySelector('#popupContainer')))
	                .clickOutsideToClose(true)
	                .title('Lo sentimos')
	                .textContent('Intente mas Tarde :(')
	                .ariaLabel('Alert Dialog Demo')
	                .ok('Entendido')
	            ).finally(function() {
	            	$mdDialog.hide();
		          	$location.path('/Login')
		        });
	        }
    	});
	}
})