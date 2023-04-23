<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Compra;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function info(){
        return [
            "articulos" => Articulo::where('estado',1)->get()->count(),
            "usuarios" => User::where('estado',1)->get()->count(),
            "ventas"=> Venta::where('estado',1)->get()->sum('total'),
            "compras" => Compra::where('estado',1)->get()->sum('total'),
            "meses"=>$this->VentasMensual(),
            "meses2"=>$this->ComprasMensual(),
            "articuloMV"=>$this->ProductoMasVendido(),
            "articuloLV"=>$this->ProductoMenosVendido(),
            "marcaMV"=>$this->MarcaMasVendida(),
            "marcaLV"=>$this->MarcaMenosVendida(),
            "topArticulos"=>$this->ReporteArticulos(),
            "untopArticulos"=>$this->ReporteArticulosMenos(),
            //"stockM"=>$this->StockMinimoAlert(),
        ];
    }

    public function VentasMensual(){
        $ventas = Venta::select(
            DB::raw('sum(total) as total'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes")
        )->where('estado',1)
            ->groupBy('mes')
            //->limit(7)
            ->get();
            return $ventas;
    }

    public function ComprasMensual(){
        $compras = Compra::select(
            DB::raw('sum(total) as total'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes")
        )->where('estado',1)
            ->groupBy('mes')
            //->limit(7)
            ->get();
            return $compras;
    }


    public function ProductoMasVendido(){
        $articuloTop = DB::table('ventas')
        ->select(
            'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS totalVendidos'),
            DB::raw('marcas.nombre AS marca'),
            DB::raw('modelos.nombre AS modelo'),
            
            )
        ->where([
            ['ventas.estado',1],
            ['venta_inventarios.estado',1],
            ['inventarios.estado',1],
            ])
        ->join('venta_inventarios','venta_inventarios.venta_id','=','ventas.id') //vrnta_inventarios también debe ser igual a 1 para la consulta, veficar arreglo de condiciones en where
        ->join('inventarios','inventarios.id','=','venta_inventarios.inventario_id')
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->groupBy('modelos.nombre','marcas.nombre','articulos.nombre')
        ->orderBy('totalVendidos','desc')
        ->limit(1)
        ->get();
        /*dd($articuloTop);
        return;*/
        return $articuloTop;
    }

    public function ProductoMenosVendido(){
        $articuloUntop = DB::table('ventas')
        ->select(
            'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS totalVendidos'),
            DB::raw('marcas.nombre AS marca'),
            DB::raw('modelos.nombre AS modelo'),
            )
            
        ->join('venta_inventarios','venta_inventarios.venta_id','=','ventas.id')
        ->join('inventarios','inventarios.id','=','venta_inventarios.inventario_id')
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->where([
            ['ventas.estado',1],
            ['venta_inventarios.estado',1],
            ['inventarios.estado',1],
            ])
        ->groupBy('modelos.nombre','marcas.nombre','articulos.nombre')
        ->orderBy('totalVendidos','asc')
        ->limit(1)
        ->get();
        /*dd($articuloTop);
        return;*/
        return $articuloUntop;
    }

    public function MarcaMasVendida(){
        $marcaTop = DB::table('ventas')
        ->select(
            //'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS totalVendidos'),
            DB::raw('marcas.nombre AS marca'),
            //DB::raw('modelos.nombre AS modelo'),
            
            )
        ->where([
            ['ventas.estado',1],
            ['venta_inventarios.estado',1],
            ['inventarios.estado',1],
            ])
        ->join('venta_inventarios','venta_inventarios.venta_id','=','ventas.id') //vrnta_inventarios también debe ser igual a 1 para la consulta, veficar arreglo de condiciones en where
        ->join('inventarios','inventarios.id','=','venta_inventarios.inventario_id')
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->groupBy('marcas.nombre')
        ->orderBy('totalVendidos','desc')
        ->limit(1)
        ->get();
        /*dd($marcaTop);
        return;*/
        return $marcaTop;
    }

    public function MarcaMenosVendida(){
        $marcaUnTop = DB::table('ventas')
        ->select(
            //'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS totalVendidos'),
            DB::raw('marcas.nombre AS marca'),
            //DB::raw('modelos.nombre AS modelo'),
            
            )
        ->where([
            ['ventas.estado',1],
            ['venta_inventarios.estado',1],
            ['inventarios.estado',1],
            ])
        ->join('venta_inventarios','venta_inventarios.venta_id','=','ventas.id') //vrnta_inventarios también debe ser igual a 1 para la consulta, veficar arreglo de condiciones en where
        ->join('inventarios','inventarios.id','=','venta_inventarios.inventario_id')
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->groupBy('marcas.nombre')
        ->orderBy('totalVendidos','asc')
        ->limit(1)
        ->get();
        /*dd($marcaUnTop);
        return;*/
        return $marcaUnTop;
    }

    public function ReporteArticulos(){
        $articuloTop = DB::table('ventas')
        ->select(
            'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS totalVendidos'),
            DB::raw('marcas.nombre AS marca'),
            DB::raw('modelos.nombre AS modelo'),
            
            )
        ->where([
            ['ventas.estado',1],
            ['venta_inventarios.estado',1],
            ['inventarios.estado',1],
            ])
        ->join('venta_inventarios','venta_inventarios.venta_id','=','ventas.id') //vrnta_inventarios también debe ser igual a 1 para la consulta, veficar arreglo de condiciones en where
        ->join('inventarios','inventarios.id','=','venta_inventarios.inventario_id')
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->groupBy('modelos.nombre','marcas.nombre','articulos.nombre')
        ->orderBy('totalVendidos','desc')
        ->limit(5)
        ->get();
        /*dd($articuloTop);
        return;*/
        return $articuloTop;
    }

    public function ReporteArticulosMenos(){
        $articuloUnTop = DB::table('ventas')
        ->select(
            'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS totalVendidos'),
            DB::raw('marcas.nombre AS marca'),
            DB::raw('modelos.nombre AS modelo'),
            
            )
        ->where([
            ['ventas.estado',1],
            ['venta_inventarios.estado',1],
            ['inventarios.estado',1],
            ])
        ->join('venta_inventarios','venta_inventarios.venta_id','=','ventas.id') //vrnta_inventarios también debe ser igual a 1 para la consulta, veficar arreglo de condiciones en where
        ->join('inventarios','inventarios.id','=','venta_inventarios.inventario_id')
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->groupBy('modelos.nombre','marcas.nombre','articulos.nombre')
        ->orderBy('totalVendidos','asc')
        ->limit(5)
        ->get();
        /*dd($articuloUnTop);
        return;*/
        return $articuloUnTop;
    }

    public function StockMinimoAlert(){
        $marcaTop = DB::table('inventarios')
        ->select(
            'articulos.nombre',
            DB::raw('SUM(inventarios.cantidad) AS total'),
            DB::raw('marcas.nombre AS marca'),
            DB::raw('modelos.nombre AS modelo'),
            
            //'articulos.stock_minimo',
            //'inventarios.cantidad',
            'inventarios.tipo'
            )
        /*->where([
            ['inventarios.estado',1],
            ['articulos.estado',1],
            ['cantidad','<=','stock_minimo'],
            ])*/
        ->join('articulos','articulos.id','=','inventarios.articulo_id')
        ->join('marcas','marcas.id','=','articulos.marca_id')
        ->join('modelos','modelos.id','=','articulos.modelo_id')
        ->groupBy('inventarios.tipo','marcas.nombre','modelos.nombre','articulos.nombre')
        ->orderBy('stock_minimo','desc')
        //->limit(1)
        ->get();
        /*dd($marcaTop);
        return;*/
        return $marcaTop;
    }
}
