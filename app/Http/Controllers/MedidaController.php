<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Medida::where('estado',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Medida = new Medida(); //Crear el modelo Marca, crear un objeto, tabla marcas
        $Medida->codigo = $request->codigo;
        $Medida->nombre = $request->nombre; //cada columna es un atributo
        $Medida->save(); //save() sirve para guardar
        return $Medida;
    }

    /**
     * Display the specified resource.
     */
    public function show(Medida $medida)
    {
        return $medida;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medida $medida)
    {
        $medida->codigo = $request->codigo;
        $medida->nombre = $request->nombre;
        $medida->save();
        return $medida;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medida $medida)
    {
        $medida->estado = 0;
        $medida->save();
        return $medida;
    }
}
