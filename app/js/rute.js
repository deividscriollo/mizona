var app = angular.module('dcapp');
app.config(function ($routeSegmentProvider, $routeProvider) {

$routeSegmentProvider.

    when('/Administrador',          's1').
    when('/Administrador/Perfil',          's1.perfil').
    when('/Administrador/Localizacion',          's1.localizacion').
    when('/Administrador/Redes-Sociales',          's1.redes').
    when('/Administrador/Publicaciones',          's1.publicacion').
    when('/Login',    's4').
    when('/Login/Acceso',    's4.acceso').
    when('/Login/Registro',    's4.registro').
    when('/Login/Recuperar',    's4.recuperar').
    when('/active_count/:id',    'active_count').
    when('/recuperarpass/:id',    'recuperarpass').

    

    when('/Admin',    's3').
    when('/Admin/Mapa-VistaPrevia',    's3.mapgeneral').
    when('/Admin/Subir_Imagenes',    's3.subirimg').

    
    when('/Admin/Inicio',    's3.inicio').
    when('/Admin/Perfil',    's3.perfil').
    when('/section1/:id',      's1.itemInfo').
    when('/section1/:id/edit', 's1.itemInfo.edit').
    when('/section2',          's2').

    segment('s1', {
        templateUrl: 'view/inicio.html',
        default: true,
        controller: 'Administrador-Ctrl'
    }).
    within().
        segment('perfil', {
            templateUrl: 'view/admin/perfil.html',
            controller: 'admin-perfil-Ctrl'
        }).
        segment('localizacion', {
            templateUrl: 'view/admin/localizacion.html',
            controller: 'localizacion-Ctrl',
        }).
        segment('redes', {
            templateUrl: 'view/admin/redes.html',
            controller: 'redes-Ctrl',
        }).
        segment('publicacion', {
            templateUrl: 'view/admin/publicacion.html',
            controller: 'publicacion-Ctrl',
        }).
        up().
    segment('s4', {
        templateUrl: 'view/login.html',
        controller: 'LogingeneralCtrl'
    }).
        within().
            segment('acceso', {
                templateUrl: 'view/logeogeneral/login.html',
                default: true,
                controller: 'logeoCtrl'
            }).
            segment('registro', {
                templateUrl: 'view/logeogeneral/registro.html',
                controller: 'registrarCtrl'
            }).
            segment('recuperar', {
                templateUrl: 'view/logeogeneral/recuperar.html',
                controller: 'recuperarCtrl'
            }).
            up().
    segment('s3', {
        templateUrl: 'view/admin.html',
        controller: 'admin-Ctrl'
    }).
        within().
            segment('inicio', {
                templateUrl: 'view/admin/inicio.html',
                controller: 'admin-inicio-Ctrl',
                default: true,
            }).
            segment('perfil', {
                templateUrl: 'view/admin/perfil.html',
                controller: 'admin-perfil-Ctrl'
            }).
            segment('mapgeneral', {
                templateUrl: 'view/admin/MapGeneral.html',
                controller: 'admin-mapgeneral-Ctrl'
            }).
            segment('subirimg', {
                templateUrl: 'view/admin/subirimg.html',
                controller: 'admin-subirimg-Ctrl'
            }).
            
            up().
    segment('active_count', {
        // templateUrl: 'view/admin.html',
        controller: 'Active-count-Ctrl',
        dependencies: ['id']
    }).
    segment('recuperarpass', {
        // templateUrl: 'view/admin.html',
        controller: 'Recuperar-pass-Ctrl',
        dependencies: ['id']
    })

    $routeProvider.otherwise({redirectTo: '/as'});

    
});