<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToFreeDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_diagnostics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tech_center_id');
            $table->bigInteger('user_car_id');
            $table->timestamp('date')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('free_diagnostics', function (Blueprint $table) {
            $table->dropColumn('free_diagnostic_type_id');
        });
    }
}
