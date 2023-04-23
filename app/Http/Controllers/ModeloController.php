<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Modelo::where('estado',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Modelo = new Modelo();
        $Modelo->nombre = $request->nombre; 
        $Modelo->save();
        return $Modelo;
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        return $modelo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        $modelo->nombre = $request->nombre;
        $modelo->save();
        return $modelo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        $modelo->estado = 0;
        $modelo->save();
        return $modelo;
    }
}
