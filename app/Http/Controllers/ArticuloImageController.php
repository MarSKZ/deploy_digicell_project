<?php

namespace App\Http\Controllers;

use App\Models\ArticuloImage;
use App\Models\Articulo;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArticuloImageController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Articulo $articulo)
    {
        //cuando utilizamos dropzone cada ves que enviamos un archivo lo recibimos con el nombre de file
        $file = $request->file('file')->store('public/articulos');
        $url = Storage::url($file);
        $image = new Image();
        $image->path = $url; //donde guardamos el archivo
        $image->save();
        $ArticuloImage = new ArticuloImage();
        $ArticuloImage->image_id = $image->id;
        $ArticuloImage->articulo_id = $articulo->id;
        $ArticuloImage->save();
        return $ArticuloImage;
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        $articulo->marca = $articulo->Marca; //Como obtner información de una relación 
        $articulo->articulo_images = $articulo->ArticuloImages()->get()->each(function($i){
            $i->url = $i->image->UrlImage();
        });
        return $articulo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticuloImage $articuloImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticuloImage $articuloImage)
    {
        $articuloImage->estado = 0;
        $articuloImage->save();
        return $articuloImage;
    }
}
