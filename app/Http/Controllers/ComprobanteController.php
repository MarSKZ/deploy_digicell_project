<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comprobante::where('estado',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Comprobante = new Comprobante();
        $Comprobante->codigo = $request->codigo;
        $Comprobante->nombre = $request->nombre;
        $Comprobante->save();

        return $Comprobante;
    }

    /**
     * Display the specified resource.
     */
    public function show(Comprobante $comprobante)
    {
        return $comprobante;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comprobante $comprobante)
    {
        $comprobante->codigo = $request->codigo;
        $comprobante->nombre = $request->nombre;
        $comprobante->save();

        return $comprobante;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comprobante $comprobante)
    {
        $comprobante->estado = 0;
        $comprobante->save();
        return $comprobante;
    }
}
