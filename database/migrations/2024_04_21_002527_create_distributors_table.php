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
        Schema::create('distributor', function (Blueprint $table) {
            $table->bigIncrements('id_distributor');
            $table->rememberToken();
            $table->string('nama_distributor', 80);
            $table->string('alamat_distributor', 100);
            $table->string('telp_distributor', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributor');
    }
};
