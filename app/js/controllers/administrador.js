var app = angular.module('dcapp');
app.controller('Administrador-Ctrl', function($scope, $timeout, $mdBottomSheet, $mdToast, $localStorage, empresa) {
	console.log('test administrador');
	var dataform = $localStorage.count.data;
    empresa.get(dataform).then(function(data) {
      // console.log(data); //event res
        $scope.local = data;
    });

    $scope.toggleSidenav=function(menuId) {
        $mdSidenav(menuId).toggle();
    };

    $scope.menu = [ 
                    { title: 'Inicio', icon: 'home', link: '#/Administrador'},
                    { link : '', title: 'Perfil', icon: 'perm_contact_calendar', link: '#/Administrador/Perfil'},
                    { title: 'Perfil Imagenes', icon: 'aspect_ratio', link: '#/Administrador/Subir_Imagenes'},
                    { title: 'Publicacion Imagenes', icon: 'wallpaper', link: '#/Administrador/Subir_Imagenes'},
                    { title: 'Mapa', icon: 'place', link: '#/Administrador/Mapa-VistaPrevia'}
                  ];
    $scope.admin= [ 
                    {link: '', title: 'Trash', icon: 'delete'},
                    {link: 'showListBottomSheet($event)', title: 'Settings', icon: 'settings'}
                  ];


    $scope.dclocation = function(data){
    	console.log(data);
    }
});