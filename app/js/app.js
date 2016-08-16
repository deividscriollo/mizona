var app = angular.module('dcapp', [
    'ngMaterial',
    'ngRoute',
    'route-segment',
    'view-segment',
    'ngMdIcons',
    'ngResource',
    'ngStorage',
    'ngMessages',
    'leaflet-directive',
    'blockUI',
    'ngFileUpload'
    
]);
// thme config
app.config(function($mdThemingProvider) {
    $mdThemingProvider.theme('default')
        .primaryPalette('pink', {
            'default': '400', // by default use shade 400 from the pink palette for primary intentions
            'hue-1': '100', // use shade 100 for the <code>md-hue-1</code> class
            'hue-2': '600', // use shade 600 for the <code>md-hue-2</code> class
            'hue-3': 'A100' // use shade A100 for the <code>md-hue-3</code> class
        })
        // If you specify less than all of the keys, it will inherit from the
        // default shades
        .accentPalette('pink', {
            'default': '600' // use shade 200 for default, and keep all other shades the same
        });
});
app.config(function(blockUIConfig) {
  // Change the default overlay message
  blockUIConfig.message = 'Por favor, Espere un momento ';
  // Change the default delay to 100ms before the blocking is visible
  blockUIConfig.delay = 100;
});