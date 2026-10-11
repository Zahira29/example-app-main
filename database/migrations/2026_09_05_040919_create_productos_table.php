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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            // Personalizado: Añadimos un SKU único para diferenciarnos
            $table->string('codigo_sku', 50)->unique()->nullable(); 
            $table->string('nombre', 120);
            // Hecho 'nullable' para que no dé error 500 si el cliente no envía la descripción
            $table->text('descripcion')->nullable(); 
            $table->decimal('precio', 10, 2);
            // Personalizado: Agregamos stock para enriquecer el CRUD
            $table->integer('stock')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
