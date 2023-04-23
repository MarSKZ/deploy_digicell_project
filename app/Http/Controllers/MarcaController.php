<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::where('estado',1)->get(); //all() lista todos los registros

        //El modelo Marca hace referencia a la tabla Marca
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //En cada solicitud que tenemos siempre recibe un parámetro
        $Marca = new Marca(); //Crear el modelo Marca, crear un objeto, tabla marcas
        $Marca->nombre = $request->nombre; //cada columna es un atributo
        $Marca->save(); //save() sirve para guardar
        return $Marca; //Una vez que lo guarde lo vamos a tener que retornar
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return $marca;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    { //vas a utilizar el modelo Marca, vas a acceder al atributo/columna 'nombre' y le vas a establecer el nuevo nombre que estás recibiendo con la solicitud de request
        $marca->nombre = $request->nombre;
        $marca->save();
        return $marca;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        $marca->estado = 0;
        $marca->save();
        return $marca;
    }
}
