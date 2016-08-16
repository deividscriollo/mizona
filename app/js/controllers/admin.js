var app = angular.module('dcapp');
app.controller('admin-Ctrl', function($scope, $timeout, $mdBottomSheet, $mdToast, $localStorage, empresa) {
  var dataform = $localStorage.count.data;
  empresa.get(dataform).then(function(data) {
      // console.log(data); //event res
      $scope.local = data;
  });
	// console.log($localStorage);
    $scope.showListBottomSheet = function(){
    	console.log('test asd');
    	$scope.alert = '';
	    $mdBottomSheet.show({
	      templateUrl: 'view/admin/layout_toolbar.html',
	      controller: 'GridBottomSheetCtrl'
	    }).then(function(clickedItem) {
	      $scope.alert = clickedItem['name'] + ' clicked!';
	    });
    }
    $scope.menu = [
    {
      title: 'Inicio',
      icon: 'ic_launch_24px.svg',
      link: '#/Admin/Inicio'
    },
    {
      link : '',
      title: 'Perfil',
      icon: 'ic_person_24px.svg',
      link: '#/Admin/Perfil'
    },
    {
      title: 'Subir Imagenes',
      icon: 'ic_photo_24px.svg',
      link: '#/Admin/Subir_Imagenes'
    },
    {
      title: 'Mapa',
      icon: 'ic_place_24px.svg',
      link: '#/Admin/Mapa-VistaPrevia'
    }
  ];
});
app.controller('GridBottomSheetCtrl', function($scope, $mdBottomSheet) {
  $scope.items = [
    { name: 'Perfil', icon: 'img/icons/ic_person_24px.svg', url:'#/Admin/Perfil'},
    { name: 'Salir', icon: 'img/icons/ic_exit_to_app_black_24px.svg', url:'#/Login'},
  ];
  $scope.listItemClick = function($index) {
    var clickedItem = $scope.items[$index];
    $mdBottomSheet.hide(clickedItem);
  };
});
app.controller('admin-mapgeneral-Ctrl', function($scope, $mdBottomSheet, $window) {
	console.log($window.innerHeight);
	$scope.window = $window.innerHeight-100;

	// angular.extend($scope, {
	//     center: {
	//         lat: 0.3301245,
	//         lng: -78.2162191,
	//         zoom: 16
	//     }
	// });
	var map = L.map('map').setView([0.3301245, -78.2162191], 16);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	L.marker([0.3301245, -78.2162191]).addTo(map)
	    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
	    .openPopup();
});
