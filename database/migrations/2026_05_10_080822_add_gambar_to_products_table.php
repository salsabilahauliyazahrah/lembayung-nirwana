<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('gambar_1')->nullable();
            $table->string('gambar_2')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'gambar_1',
                'gambar_2'
            ]);

        });
    }
};