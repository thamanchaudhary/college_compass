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
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('website')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('examp_required')->nullable();
            $table->string('reconization')->nullable();
            $table->string('course')->nullable();
            $table->string('degree')->nullable();
            $table->text('description')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
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
