'use strict';

angular.module('Client', ['ngResource','ngRoute']) //nombre de la aplicación, modulos que vamos a utilizar
    .config(function($routeProvider){
        $routeProvider
        .when('/personas',{  //ruta personas
            templateUrl: 'views/persona/index.html', //URL del template, el cual va a invocar cuando suceda la ruta de arriba (personas)
            controller: 'IndexPersonaCtrl' //controlador responsable del template
        })
        .when('/personas/new',{  //ruta personas
            templateUrl: 'views/persona/create.html', //URL del template, el cual va a invocar cuando suceda la ruta de arriba (personas)
            controller: 'CreatePersonaCtrl' //controlador responsable del template
        })
        .when('/personas/edit/:id',{  //ruta personas
            templateUrl: 'views/persona/create.html', //URL del template, el cual va a invocar cuando suceda la ruta de arriba (personas)
            controller: 'EditPersonaCtrl' //controlador responsable del template
        })
        .otherwise({
            redirectTo: '/'
        });
    });