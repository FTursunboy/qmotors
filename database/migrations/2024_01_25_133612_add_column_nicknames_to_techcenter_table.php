<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNicknamesToTechcenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_centers_nicknames', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->bigInteger('telegram_id')->nullable();
            $table->unsignedBigInteger('tech_center_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
