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
        Schema::create('product_invoice_only', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deskripsi_barang', 50);
            $table->string('qty', 13);
            $table->string('harga', 50);
            $table->string('total', 50);
            $table->bigInteger('id_invoice_only')->unsigned();
            $table->foreign('id_invoice_only')->references('id')->on('invoice_only');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_invoice_only');
    }
};