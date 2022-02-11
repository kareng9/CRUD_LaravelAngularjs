'use strict';

angular.module('Client')
    .controller('IndexPersonaCtrl',function($scope, PersonaResource, $location, $timeout){ //creamos nuestro controlador IndexPersonaCtrl que nos listara las personas
        $scope.Personas = PersonaResource.query(); //.query nos trae las personas existentes
        $scope.removePersona = function(id){
            PersonaResource.delete({
                id: id
            });
            Materialize.toast('Persona Creada.',5000,'green accent-4');
            $timeout(function(){
                $location.path('/personas');
            },1000);
        }
    }) 
    .controller('CreatePersonaCtrl',function($scope, PersonaResource, $location, $timeout){ //Creamos otro controlador CreatePersonaCtrl, en la funcion le inyectamos el scope y el servicio PersonaResource de PersonaService
        $scope.title="Crear Persona";
        $scope.button="Guardar";
        $scope.Persona={}; 
        $scope.savePersona = function(){    
            //console.log($scope.Persona);    
            PersonaResource.save($scope.Persona); 
            Materialize.toast('Persona Creada.',5000,'green accent-4');
            $timeout(function(){
                $location.path('/personas');
            },1000);
        };
    })
    .controller('EditPersonaCtrl',function($scope, PersonaResource, $location, $timeout, $routeParams){
        $scope.title="Editar Persona";
        $scope.button="Actualizar";
        $scope.Persona=PersonaResource.get({  //obtenemos un elemento especifico mediante su id
            id: $routeParams.id
        });
        $scope.savePersona = function(){
            PersonaResource.update($scope.Persona);
            Materialize.toast('Persona Actualizada.',5000,'green accent-4');
            $timeout(function(){
                $location.path('/personas');
            },1000);
        }
    }); 