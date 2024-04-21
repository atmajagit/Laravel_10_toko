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
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id_buku');
            $table->rememberToken();
            $table->string('judul_buku', 100);
            $table->string('penulis', 60);
            $table->string('penerbit', 60);
            $table->string('tahun_terbit', 4);
            $table->integer('stok');
            $table->integer('harga_pokok');
            $table->integer('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
