var app = angular.module('starter');
app.controller('tiendaCtrl', function($scope, $stateParams, servicios) {
	
	$scope.linkserver = servicios.imgserver();
	servicios.get_tienda($stateParams).then(function(data) {
	    $scope.tienda = data[0];
	    $scope.id = $stateParams;
	});
	servicios.get_tienda_logo($stateParams).then(function(data) {
	    $scope.logo = data;
	});
	servicios.get_tienda_galeria($stateParams).then(function(data) {
		var limit = data.length;
	    $scope.portada = data[limit-1];
	});
	servicios.get_tienda_localizacion($stateParams).then(function(data) {
		var data = data[0];
	    $scope.localizacion = data;
	    
		    // set up the map
		map = new L.Map('map');

		// create the tile layer with correct attribution
		var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
		var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});		

		// start the map in South-East England
		map.setView(new L.LatLng(0.33303863026029, -78.2168841362),15);
		map.addLayer(osm);
		// map generate position add marke
	    addMarker(data.latitude, data.longitude);
	});

	
	



	var addMarker = function(latitude, longitude){
		// Add marker to map at click location; add popup window
		console.log(latitude, longitude);
		var newMarker = new L.marker(
										[latitude, longitude],
										{
											// draggable: true,        // Make the icon dragable
								            title: 'Hover Text',     // Add a title
								         }            // Adjust the opacity
									).addTo(map);

	}
})

app.controller('mapaCtrl', function($scope, $stateParams, servicios) {
	console.log($stateParams);
	console.log('asdas');
});
