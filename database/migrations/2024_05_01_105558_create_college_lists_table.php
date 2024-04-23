<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('college_fee')->nullable();
            $table->string('examp_required')->nullable();
            $table->string('course')->nullable();
            $table->string('degree')->nullable();
            $table->text('description')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('college_lists');
    }
}
