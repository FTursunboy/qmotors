<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColiun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // active_admin_comments
        Schema::create('active_admin_comments', function (Blueprint $table) {
            $table->id();
            $table->string('namespace')->nullable();
            $table->text('body');
            $table->string('resource_type')->nullable();
            $table->bigInteger('resource_id')->nullable();
            $table->string('author_type')->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->timestamps();
        });

        // admin_users
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->default('');
            $table->string('encrypted_password')->default('');
            $table->string('reset_password_token')->nullable();
            $table->timestamp('reset_password_sent_at')->nullable();
            $table->timestamp('remember_created_at')->nullable();
            $table->timestamps();
            $table->string('remember_token', 100)->nullable();
        });

        // ar_internal_metadata
        Schema::create('ar_internal_metadata', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        // articles
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('preview')->nullable();
            $table->text('text');
            $table->timestamps();
        });

        // bonuses
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

        // call_requests
        Schema::create('call_requests', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->boolean('processed')->default(false);
            $table->timestamps();
        });

        // car_marks
        Schema::create('car_marks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        // car_models
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('car_mark_id')->nullable();
            $table->timestamps();
        });

        // ckeditor_assets
        Schema::create('ckeditor_assets', function (Blueprint $table) {
            $table->id();
            $table->string('data_file_name');
            $table->string('data_content_type')->nullable();
            $table->integer('data_file_size')->nullable();
            $table->string('type', 30)->nullable();
            $table->timestamps();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 255);
            $table->text('connection');
            $table->text('queue');
            $table->text('payload');
            $table->text('exception');
            $table->timestamp('failed_at')->default(now());
        });

        // free_diagnostics


        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->boolean('admin_message')->default(false);
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
            $table->bigInteger('tech_center_id')->nullable();
        });

        // migrations

        // notifications
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('text');
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
            $table->integer('notification_type')->default(0);
            $table->integer('additional_id')->nullable();
        });

        Schema::create('notifications_users', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('notification_id')->unsigned();
        });

        // order_photos
        Schema::create('order_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('photo');
            $table->timestamps();
        });

        // order_recommendations
        Schema::create('order_recommendations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('title');
            $table->timestamps();
        });

        // order_spares
        Schema::create('order_spares', function (Blueprint $table) {
            $table->id();
            // Добавь столбцы для order_spares
            $table->timestamps();
        });

        // Добавим ALTER TABLE для каждой из таблиц

        // notifications

//
//        Schema::create('order_spares', function (Blueprint $table) {
//            $table->id();
//            $table->bigInteger('order_id')->unsigned();
//            $table->string('title');
//            $table->timestamps();
//        });

        // order_types
        Schema::create('order_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        // order_works
        Schema::create('order_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('title');
            $table->timestamps();
        });

        // orders
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
