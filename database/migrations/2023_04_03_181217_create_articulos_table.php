<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('barra')->nullable();
            $table->foreignId('marca_id')->nullable()->constrained('marcas');
            $table->foreignId('modelo_id')->nullable()->constrained('modelos');
            $table->foreignId('medida_id')->nullable()->constrained('medidas');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias');
            $table->decimal('compra',8,2)->default(0);
            $table->decimal('venta',8,2)->default(0);
            $table->decimal('stock_minimo',8,2)->default(0);
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
