<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceIdToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('text');
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
            $table->integer('notification_type')->default(0);
            $table->integer('additional_id')->nullable();
        });
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('service_id')->nullable();
            $table->uuid('push_uuid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('push_uuid');
        });
    }
}
