<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Documento::where('estado',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Documento = new Documento();
        $Documento->codigo = $request->codigo;
        $Documento->nombre = $request->nombre;
        $Documento->save();
        
        return $Documento;
    }

    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        return $documento;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documento $documento)
    {
        $documento->codigo = $request->codigo;
        $documento->nombre = $request->nombre;
        $documento->save();
        
        return $documento;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        $documento->estado = 0;
        $documento->save();
        return $documento;
    }
}
