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
        Schema::table('free_diagnostics', function (Blueprint $table) {
            $table->foreignId('free_diagnostic_type_id')->nullable()->constrained('free_diagnostic_types')->after('free_diagnostic_type');
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
