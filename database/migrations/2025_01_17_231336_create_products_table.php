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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del producto
            $table->text('description')->nullable(); // Descripción del producto
            $table->decimal('price',10,2);
            $table->string('image')->nullable(); // Ruta de la foto
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relación con categorías
            $table->foreignId('subcategory_id')->nullable()->constrained()->onDelete('set null'); // Relación con subcategorías
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
