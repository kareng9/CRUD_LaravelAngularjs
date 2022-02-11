//Consumo lo que hace laravel mediante este servicio
'use strict';

angular.module('Client')
    .factory('PersonaResource',function($resource){ //construir el servicio, PersonaResource: es el nombre del servicio, en la función inyectamos el resource
        return $resource("http://localhost:8000/personas/:id", {  //retorna el resource y le pasamos la ruta que va a consumir /personas es la ruta que esta en web.php
            id: "@id" //resource no contien el metodo update
        },{
            update: {
                method: "PUT"
            }
        }); 
    });