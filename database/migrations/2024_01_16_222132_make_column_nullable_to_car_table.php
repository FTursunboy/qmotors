<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_cars', function (Blueprint $table) {

            $table->string('year')->nullable()->change();
            $table->string('mileage')->nullable()->change();


        });
    }

    public function down(): void
    {

    }
};
