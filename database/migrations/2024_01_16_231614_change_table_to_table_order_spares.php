<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('order_spares', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
        });
    }

    public function down(): void
    {
        Schema::table('order_spares', function (Blueprint $table) {
            $table->dropColumn('order_id');
        });
    }
};
