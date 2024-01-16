<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFreeDiagnosticsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_car_id')->unsigned();
            $table->bigInteger('tech_center_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->timestamp('date')->nullable();
            $table->integer('order_type');
            $table->text('description');
            $table->boolean('guarantee')->default(false);
            $table->timestamps();
            $table->bigInteger('stock_id')->unsigned();
            $table->string('mileage')->nullable();
            $table->string('order_number')->nullable();
            $table->integer('status')->default(0);
            $table->bigInteger('order_type_id')->unsigned();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('free_diagnostics')->default(false);
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
            $table->dropColumn('free_diagnostics');
        });
    }
}
