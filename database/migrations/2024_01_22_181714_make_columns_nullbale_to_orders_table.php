<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnsNullbaleToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::table('user_cars', function (Blueprint $table) {
                $table->string('vin')->nullable()->change();
            });
            Schema::table('orders', function (Blueprint $table) {
                $table->string('stock_id')->nullable()->change();
                $table->text('description')->nullable()->change();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
