<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\CajaCompra;
use App\Models\CompraInventario;
use App\Models\Inventario;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compra = Compra::where('estado',1)->orderBy('id','desc')->get();
        $list=[];
        foreach($compra as $m){
            $list[] = $this->show($m);
        }
        return $list;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compra = new Compra();
        $compra->total = $request->total;
        $compra->tipo = $request->tipo;
        $compra->proveedor = $request->proveedor;
        $compra->motivo = $request->motivo;
        $compra->save();
        $cajaCompra = new CajaCompra();
        $cajaCompra->caja_id = $request->caja_id;
        $cajaCompra->compra_id = $compra->id;
        $cajaCompra->monto = $request->total;
        $cajaCompra->save();

        $numero = Compra::all()->count()+1;
        if(isset($request->carrito)){//validar si existe la petición carrito
            if(!empty($request->carrito)){
                foreach($request->carrito as $m){
                    $articulo = $m['articulo'];
                    $inventario = new Inventario();
                    $inventario->articulo_id = $articulo['id'];
                    $inventario->tipo = 1;
                    $inventario->compra = $articulo['compra'];
                    $inventario->venta = $articulo['venta'];
                    $inventario->cantidad = $m['cantidad'];
                    $inventario->motivo = "Compra #".$numero;
                    $inventario->save();
                    $compraInventario = new CompraInventario();
                    $compraInventario->inventario_id = $inventario->id;
                    $compraInventario->compra_id = $compra->id;
                    $compraInventario->cantidad = $m['cantidad'];
                    $compraInventario->precio = $m['precio'];
                    $compraInventario->save();
                }
            }
        }
        return $compra;
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        $compra->compra_inventarios = $compra->CompraInventarios()->with(['Inventario'=>function($i){
            $i->with(['Articulo'=>function($a){
                $a->with(['Marca','Modelo','Categoria','Medida']);
            }]);
        }])->get();
        $compra->fecha = $compra->created_at->format('d-m-Y');
        return $compra;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        $compra->estado = 0;
        $compra->save();
        $compra->caja_compra = $compra->CajaCompra;
        $compra->caja_compra->estado = 0;
        $compra->caja_compra->save();
        //TEST
        /*
        $compra->compra_inventarios = $compra->CompraInventarios;
        $compra->compra_inventarios->estado = 0;
        $compra->compra_inventarios->save();
    */
        //FIN TEST
        return $compra;
        
    }
}
