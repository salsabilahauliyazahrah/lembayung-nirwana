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

        $table->string('nama_produk');
        $table->integer('harga');
        $table->integer('kapasitas');

        $table->foreignId('category_id')
            ->constrained('categories');

        $table->unsignedBigInteger('brand_id');

        $table->foreign('brand_id')
            ->references('brand_id')
            ->on('brands');

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
