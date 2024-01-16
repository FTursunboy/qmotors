<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFcmtokenToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fcmtoken')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fcmtoken');
        });
    }
}
