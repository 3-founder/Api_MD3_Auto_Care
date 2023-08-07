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
        Schema::create('penawaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_penawaran', 50);
            $table->string('hal_penawaran', 50);
            $table->string('nama_customer', 50);
            $table->date('tanggal');
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
        Schema::dropIfExists('penawaran');
    }
};