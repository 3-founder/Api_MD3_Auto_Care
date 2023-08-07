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
        Schema::table('invoice_only', function (Blueprint $table) {
            $table->string('ket_pembayaran', 20)->after('id_user_signature');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_only', function (Blueprint $table) {
            if (Schema::hasColumn('invoice_only', 'ket_pembayaran')) {
                $table->dropColumn('ket_pembayaran');
            }
        });
    }
};