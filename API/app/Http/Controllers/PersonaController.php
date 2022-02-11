<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;  //Incorporamos nuestro modelo
use Illuminate\Routing\Route; //Incluir el route


class PersonaController extends Controller
{
    /*public function __construct(){
        $this->beforeFilter('@find', ['only' => ['show', 'update', 'destroy']]);
        $this->beforeFilter('@find', array('only' =>  'show','update','destroy'));
    }*/

   public function find(Route $route){  //Creamos nuestro metodo find, el cual recibe a route 
       $this->persona = Persona::find($route->getParameter('personas')); //buscamos una persona mediante la ruta
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all(); //Creamos una variable personas que va a ser igual a  todas las personas existentes
        return response()->json($personas->toArray()); //estas personas enviamos mediante json y convertirla en un Array
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Persona::create($request->all()); //hacemos referencia al modelo, vamos al metodo create, le pasamos todo el request
        return response()->json(["mensaje"=>"creada correctamente"]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function show($id)
    {
        return response()->json($this->persona);  //enviamos la nota en el metodo show por como maneja las rutas angular
        $this->persona = Persona::find($route->getParameter('personas'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->persona->fill($request->all());
        $this->persona->save();
        return response()->json(["mensaje"=>"Actualizada"]);
        $this->persona = Persona::find($route->getParameter('personas'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->note->delete();
        return response()->json(["mensaje"=>"Eliminada"]);
        $this->persona = Persona::find($route->getParameter('personas'));
        
    }
}
