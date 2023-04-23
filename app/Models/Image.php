<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function UrlImage(){
        return url($this->path);
        //url() -> se encarga de concatenar el parámetro que le estamos enviando con la ubicación actual de donde se está corriendo nuestro proyecto de laravel
    }
}
