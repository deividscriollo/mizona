var app = angular.module('starter');
var server = 'http://192.168.1.7/server/data/';
app.service('servicios', function($http) {
	this.imgserver = function() {
		return 'http://192.168.1.7/server/data/imagenes/';
	};
	this.getempresas = function(postData) {
        // limpiar registros
        var url = server+'movil/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'getempresas', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.get_tienda = function(postData) {
        // limpiar registros
        var url = server+'movil/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get_tienda', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.get_tienda_localizacion = function(postData) {
        // limpiar registros
        var url = server+'movil/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get_tienda_localizacion', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.get_tienda_logo = function(postData) {
        // limpiar registros
        var url = server+'movil/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get_tienda_logo', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.get_tienda_galeria = function(postData) {
        // limpiar registros
        var url = server+'movil/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get_tienda_galeria', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };

    
});

