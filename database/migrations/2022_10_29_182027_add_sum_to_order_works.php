<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSumToOrderWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('title');
            $table->timestamps();
        });
        Schema::table('order_works', function (Blueprint $table) {
            $table->integer('count')->nullable()->default(0);
            $table->integer('hours')->nullable()->default(0);
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
        Schema::table('order_works', function (Blueprint $table) {
            $table->dropColumn('count');
            $table->dropColumn('hours');
            $table->dropColumn('discount');
            $table->dropColumn('price');
            $table->dropColumn('sum');
        });
    }
}
