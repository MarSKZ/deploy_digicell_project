<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    //PRUEBA
    /*
    public function CompraInventarios(){
        return $this->hasMany(CompraInventario::class)->where('estado',1);
    }
    public function VentaInventarios(){
        return $this->hasMany(VentaInventario::class)->where('estado',1);
    }
    */
    //FIN PRUEBA
    public function Articulo(){
        return $this->belongsTo(Articulo::class);
    }
}
