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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->bigIncrements('id_pembelian');
            $table->rememberToken();
            $table->unsignedBigInteger('id_distributor')->unique();
            $table->unsignedBigInteger('id_buku')->unique();
            $table->integer('jumlah_beli');
            $table->dateTime('tanggal_beli');
            $table->timestamps();

            $table->foreign('id_distributor')->references('id_distributor')->on('distributor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
