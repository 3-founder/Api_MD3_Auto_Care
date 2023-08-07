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
        Schema::table('product_penawaran', function (Blueprint $table) {
            $table->string('type_product', 50)->after('id_penawaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_penawaran', function (Blueprint $table) {
            if (Schema::hasColumn('product_penawaran', 'type_product')) {
                $table->dropColumn('type_product');
            }
        });
    }
};