var app = angular.module('dcapp');

app.controller('LogingeneralCtrl', function($scope, $mdDialog, empresa, session, blockUI, $location) {
    $scope.menu = [ 
                    { title: 'Iniciar Session', icon: 'home', link: '#/Login/Acceso'},
                    { title: 'Registrarme', icon: 'perm_contact_calendar', link: '#/Login/Registro'},
                    { title: 'Recuperas password', icon: 'aspect_ratio', link: '#/Login/Recuperar'}
                  ];
});



app.controller('logeoCtrl', function($scope, $mdDialog, empresa, session, blockUI, $location) {
    // cod    
    $scope.inisession = function() {
        var dataform = $scope.ini;
        session.iniciar(dataform).then(function(data) {
            // console.log(data); //event res
            if (data.result) {
                $location.path('/Administrador');
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
    
});

app.controller('registrarCtrl', function($scope, $mdDialog, empresa, session, blockUI, $location) {
    console.log('test');
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
                ).finally(function() {
                    $location.path('/Login/Acceso');
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
                );
            }
            $scope.dreg = {}
            $scope.newreg.$setPristine();
        });
    }
});
app.controller('recuperarCtrl', function($scope, $mdDialog, empresa, session, blockUI, $location) {
    $scope.recuperarpass = function(){
     var dataform = $scope.drecuperarpass;
     empresa.recuperarpass(dataform).then(function(data) {
         // console.log(data);
        if (data.result) {
            $mdDialog.show(
                $mdDialog.alert()
                .parent(angular.element(document.querySelector('#popupContainer')))
                .clickOutsideToClose(true)
                .title('Buen Trabajo')
                .textContent('Revise su correo para generar su nueva contraseña')
                .ariaLabel('Alert Dialog Demo')
                .ok('Entendido')
            ).finally(function() {
                $location.path('/Login/Acceso');
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
            );
        }
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
	          $location.path('/Login/Acceso');
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
	          $location.path('/Login/Acceso')
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
		          $location.path('/Login/Acceso')
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
		          	$location.path('/Login/Acceso')
		        });
	        }
    	});
	}
})