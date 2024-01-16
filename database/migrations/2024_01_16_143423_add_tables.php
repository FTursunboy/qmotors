<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('tokenable_type');
            $table->bigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 64);
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
        });
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_car_id');
            $table->timestamp('date');
            $table->text('text')->default('');
            $table->timestamps();
            $table->integer('status')->default(0);
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->text('comment');
            $table->boolean('moderated')->default(false);
            $table->bigInteger('order_id');
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('location');
            $table->string('description');
            $table->text('text');
            $table->timestamps();
        });


        Schema::create('user_car_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_car_id');
            $table->string('photo');
            $table->timestamps();
        });

        // user_cars table
        Schema::create('user_cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_model_id');
            $table->bigInteger('user_id');
            $table->integer('year');
            $table->integer('status')->default(0);
            $table->timestamp('last_visit')->nullable();
            $table->string('vin');
            $table->string('mileage');
            $table->timestamps();
            $table->string('number', 255)->nullable();
        });

        // users table


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
