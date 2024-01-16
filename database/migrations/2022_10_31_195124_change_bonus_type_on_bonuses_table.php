<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBonusTypeOnBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->integer('bonus_type')->default(0);
            $table->string('title')->nullable();
            $table->integer('points')->default(0);
            $table->integer('remainder')->default(0);
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
        Schema::table('bonuses', function (Blueprint $table) {
            $table->string('bonus_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
