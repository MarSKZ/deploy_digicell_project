<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Inventario;
use App\Models\VentaInventario;
use App\Models\CajaVenta;
use App\Models\Compra;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venta = Venta::where('estado',1)->orderBy('id','desc')->get();
        $list=[];
        foreach($venta as $m){
            $list[] = $this->show($m);
        }
        return $list;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->total = $request->total;
        $venta->pago = $request->pago;
        $venta->cambio = $request->cambio;
        $venta->tipo = $request->tipo;
        $venta->cliente = $request->cliente;
        $venta->motivo = $request->motivo;
        $venta->save();
        $numero = venta::all()->count()+1;
        if(isset($request->carrito)){//validar si existe la petición carrito
            if(!empty($request->carrito)){
                foreach($request->carrito as $m){
                    $articulo = $m['articulo'];
                    $inventario = new Inventario();
                    $inventario->articulo_id = $articulo['id'];
                    $inventario->tipo = 2;
                    $inventario->compra = $articulo['compra'];
                    $inventario->venta = $articulo['venta'];
                    $inventario->cantidad = $m['cantidad'];
                    $inventario->motivo = "Venta #".$numero;
                    $inventario->save();
                    $ventaInventario = new VentaInventario();
                    $ventaInventario->inventario_id = $inventario->id;
                    $ventaInventario->venta_id = $venta->id;
                    $ventaInventario->cantidad = $m['cantidad'];
                    $ventaInventario->precio = $m['precio'];
                    $ventaInventario->save();
                }
            }
        }
        if(isset($request->caja_id)){
            $cajaVenta = new CajaVenta();
            $cajaVenta->caja_id = $request->caja_id;
            $cajaVenta->venta_id = $venta->id;
            $cajaVenta->monto = $venta->total;
            $cajaVenta->save();

        }
        return $this->show($venta);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        $venta->venta_inventarios = $venta->VentaInventarios()->with(['Inventario'=>function($i){
            $i->with(['Articulo'=>function($a){
                $a->with(['Marca','Modelo','Categoria','Medida']);
            }]);
        }])->get();
        $venta->fecha = $venta->created_at->format('d-m-Y');
        return $venta;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->estado = 0;
        $venta->save();
        /*$caja_venta = $venta->CajaVenta;
        $caja = CajaVenta::find($caja_venta->id);
        $caja->estado = 0;
        $caja->save();*/ //MANERA1 1
        $venta->caja_venta = $venta->CajaVenta;
        $venta->caja_venta->estado = 0;
        $venta->caja_venta->save(); //MANERA 2
        return $venta;
    }
}
