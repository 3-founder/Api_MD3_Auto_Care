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
        Schema::create('invoice_only', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice', 50);
            $table->string('yth', 50);
            $table->string('sales', 50);
            $table->date('tanggal');
            $table->date('tanggal_jatuh_tempo');
            $table->string('po_no', 50)->nullable();
            $table->string('diskon', 50)->nullable();
            $table->string('ongkos_kirim', 50)->nullable();
            $table->string('cashback', 50)->nullable();
            $table->string('metode_pembayaran', 50);
            $table->string('nama_bank', 50)->nullable();
            $table->string('no_rekening', 50)->nullable();
            $table->string('a_n_rekening', 50)->nullable();
            $table->bigInteger('id_user_signature')->unsigned();
            $table->foreign('id_user_signature')->references('id')->on('signature_users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_only');
    }
};