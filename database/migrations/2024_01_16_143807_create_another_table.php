<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotherTable extends Migration
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->default('');
            $table->string('encrypted_password')->default('');
            $table->string('phone_number')->default('');
            $table->boolean('is_complete')->default(false);
            $table->string('reset_password_token')->nullable();
            $table->timestamp('reset_password_sent_at')->nullable();
            $table->timestamp('remember_created_at')->nullable();
            $table->timestamps();
            $table->string('avatar')->nullable();
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->integer('gender')->default(0);
            $table->date('birthday')->nullable();
            $table->string('additional_phone_number')->nullable();
            $table->boolean('agree_notification')->default(false);
            $table->boolean('agree_sms')->default(false);
            $table->boolean('agree_calls')->default(false);
            $table->boolean('agree_data')->default(false);
            $table->string('device_token')->nullable();
            $table->boolean('new_app')->default(false);
            $table->string('remember_token', 100)->nullable();
            $table->integer('sms_code')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('another');
    }
}
