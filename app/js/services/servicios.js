var app = angular.module('dcapp');

var server = 'http://localhost/mizona/server/data/';
app.service('imagenes', function($localStorage, $http, Upload) {
    this.update = function(postData) {
        // limpiar registros
		var promise = Upload.upload({
	      url: server+'imagenes/app.php',
	      data: postData,
	    }).then(function (response) {
				        	// The then function here is an opportunity to modify the response
					        // console.log(response);
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.savegallery = function(postData) {
        // limpiar registros
		var promise = Upload.upload({
	      url: server+'imagenes/app.php',
	      data: postData,
	    }).then(function (response) {
				        	// The then function here is an opportunity to modify the response
					        // console.log(response);
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    
});
app.service('categoria', function($localStorage, $http) {
	this.get = function() {
        // limpiar registros
        var url = server+'categoria/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get'}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.nuevo = function(postData) {
        // limpiar registros
        var url = server+'categoria/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'save':'new', data:postData}
				        }).then(function (response) {
				        	// The then function here is an opportunity to modify the response
					        // console.log(response);
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
});
app.service('empresa_categoria', function($localStorage, $http) {
	this.get = function() {
        // limpiar registros
        var url = server+'empresa_categoria/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get'}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.nuevo = function(postData) {
        // limpiar registros
        var url = server+'empresa_categoria/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'save', data:postData}
				        }).then(function (response) {
				        	// The then function here is an opportunity to modify the response
					        // console.log(response);
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
});
app.service('empresa', function($localStorage, $http) {
	this.get = function(postData) {
        // limpiar registros
        var url = server+'empresa/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.nuevo = function(postData) {
        // limpiar registros
        var url = server+'empresa/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'save', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.update = function(postData) {
        // limpiar registros
        var url = server+'empresa/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'update', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.activar_cuenta = function(postData) {
        // limpiar registros
        var url = server+'empresa/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'activar_cuenta', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.recuperarpass = function(postData) {
        // limpiar registros
        var url = server+'empresa/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'recuperarpass', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.newpass = function(postData) {
        // limpiar registros
        var url = server+'empresa/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'newpass', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
});
app.service('social', function($localStorage, $http) {
	this.get = function(postData) {
        // limpiar registros
        var url = server+'social/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.update = function(postData) {
        // limpiar registros
        var url = server+'social/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'update', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
});
app.service('localizacion', function($localStorage, $http) {
	this.get = function(postData) {
        // limpiar registros
        var url = server+'localizacion/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'get', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.update = function(postData) {
        // limpiar registros
        var url = server+'localizacion/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'update', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
});
app.service('session', function($localStorage, $http) {
	this.iniciar = function(postData) {
        // limpiar registros
        var url = server+'session/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'success':'iniciar', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        if (response.data.result) {
					        	$localStorage.count = response.data;
					        }
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
    this.cerrarsession = function(postData) {
        // limpiar registros
        var url = server+'session/app.php';
        var promise = 	$http({
				                method: 'POST',
								url: url,
								data: {'cerrarsession':'iniciar', data:postData}
				        }).then(function (response) {
					        // The return value gets picked up by the then in the controller.
					        return response.data;
				        });
        // Return the promise to the controller
	    return promise;
    };
});

app.factory('Auth', function($localStorage){
	var user = $localStorage.count;
	// console.log($localStorage.count);
	return{
	    setUser : function(aUser){
	        user = aUser;
	    },
	    isLoggedIn : function(){
	        return(user)? user.result : false;
	    }
	  }
})

app.run(['$rootScope', '$location', 'Auth', function ($rootScope, $location, Auth) {
    $rootScope.$on('$routeChangeStart', function (event) {
    	// console.log('sessiion aut');
    	// console.log(Auth);
    	// session
    	// console.log(Auth.isLoggedIn());
        if (Auth.isLoggedIn()) {
            // console.log('DENY');
            // $location.path('/Login');
            // event.preventDefault();
        }
        else {
            // console.log('ALLOW');
            // $location.path('/Admin');
            // $location.path('/Admin/Perfil');
        }
    });
}]);