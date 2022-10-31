<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSumToOrderSpares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_spares', function (Blueprint $table) {
            $table->integer('count')->nullable()->default(0);
            $table->float('discount')->nullable();
            $table->float('price')->nullable();
            $table->float('sum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_spares', function (Blueprint $table) {
            $table->dropColumn('count');
            $table->dropColumn('discount');
            $table->dropColumn('price');
            $table->dropColumn('sum');
        });
    }
}
