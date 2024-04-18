<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('forgotten_password_time')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->boolean('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_seen')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
