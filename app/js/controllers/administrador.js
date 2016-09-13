var app = angular.module('dcapp');
app.controller('Administrador-Ctrl', function($scope, $timeout, $mdBottomSheet, $mdToast, $localStorage, empresa) {
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
                    { title: 'Geolocalizacion', icon: 'location_searching', link: '#/Administrador/Localizacion'},
                    { title: 'Redes Sociales', icon: 'screen_share', link: '#/Administrador/Redes-Sociales'},
                    { title: 'Perfil Logo/Banner', icon: 'cloud_upload', link: '#/Administrador/Subir_Imagenes'},
                    { title: 'Publicaciones', icon: 'public', link: '#/Administrador/Publicaciones'},
                    { title: 'Mapa Zona', icon: 'place', link: '#/Administrador/Mapa-VistaPrevia'}
                  ];
    $scope.admin= [ 
                    {link: '', title: 'Trash', icon: 'delete'},
                    {link: 'showListBottomSheet($event)', title: 'Settings', icon: 'settings'}
                  ];


    $scope.dclocation = function(data){
    	// console.log(data);
    }
});