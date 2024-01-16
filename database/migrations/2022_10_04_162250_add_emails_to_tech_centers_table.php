<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailsToTechCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_centers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('phone');
            $table->double('lat');
            $table->double('lng');
            $table->timestamps();
            $table->string('url')->nullable();
        });
        Schema::table('tech_centers', function (Blueprint $table) {
            $table->text('emails')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tech_centers', function (Blueprint $table) {
            $table->dropColumn('emails');
        });
    }
}
