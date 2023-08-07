<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_penawaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('produk_item', 100);
            $table->string('tipe_item', 50);
            $table->string('kemasan', 50);
            $table->string('tipe_kemasan', 50);
            $table->string('mesin', 50);
            $table->string('tipe_mesin', 50);
            $table->string('harga', 15);
            $table->bigInteger('id_penawaran')->unsigned();
            $table->foreign('id_penawaran')->references('id')->on('penawaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_penawaran');
    }
};