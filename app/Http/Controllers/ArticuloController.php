<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Articulo::with(['Marca','Modelo','Medida','Categoria','ArticuloImages'])->where('estado',1)->get();
        //Le estamos diciendo que haga uso de la relación de Marca, Medida, Modelo y Categoria
        $model=  Articulo::where('estado',1)->get();
        $list = [];
        foreach($model as $m){
            $list[] = $this->show($m);
        }
        return $list;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articulo = new Articulo();
        $articulo->nombre = $request->nombre;
        $articulo->barra = $request->barra;
        $articulo->marca_id = $request->marca_id;
        $articulo->modelo_id = $request->modelo_id;
        $articulo->medida_id = $request->medida_id;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->compra = $request->compra;
        $articulo->venta = $request->venta;
        $articulo->stock_minimo = $request->stock_minimo;
        $articulo->save();
        return $articulo;
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        $articulo->marca = $articulo->Marca; //Se crea la propiedad con la relación, en "marca" se le puede poner cualquier otro nombre
        $articulo->modelo = $articulo->Modelo;
        $articulo->medida = $articulo->Medida;
        $articulo->categoria = $articulo->Categoria;
        $articulo->image = $articulo->ArticuloImages()->get()->first();
        if( $articulo->image!=null){
            $articulo->image->url = $articulo->image->image->UrlImage();
        }
        return $articulo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        $articulo->nombre = $request->nombre;
        $articulo->barra = $request->barra;
        $articulo->marca_id = $request->marca_id;
        $articulo->modelo_id = $request->modelo_id;
        $articulo->medida_id = $request->medida_id;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->compra = $request->compra;
        $articulo->venta = $request->venta;
        $articulo->stock_minimo = $request->stock_minimo;
        $articulo->save();
        return $articulo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->estado = 0; //Eliminación lógica
        $articulo->save();
        return $articulo;
    }
}
