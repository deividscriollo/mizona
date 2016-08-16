var app = angular.module('dcapp');
app.config(function ($routeSegmentProvider, $routeProvider) {

$routeSegmentProvider.

    when('/Administrador',          's1').
    when('/Administrador/Perfil',          's1.perfil').
    when('/--',          's1').
    when('/Login',    's2').
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
            // controller: 'AppCtrl'
        }).

        segment('itemInfo', {
            templateUrl: 'templates/section1/item.html',
            // controller: Section1ItemCtrl,
            dependencies: ['id']}).

        within().

            segment('overview', {
                default: true,
                templateUrl: 'templates/section1/item/overview.html'}).

            segment('edit', {
                 templateUrl: 'templates/section1/item/edit.html'}).

            up().

        segment('prefs', {
            templateUrl: 'templates/section1/prefs.html'}).

        up().
    segment('s2', {
        templateUrl: 'view/login.html',
        controller: 'LoginCtrl'
    }).
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
    segment('s4', {
        templateUrl: 'view/admin.html',
        // controller: 'LoginCtrl'
    }).
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

    $routeProvider.otherwise({redirectTo: '/'});

    
});