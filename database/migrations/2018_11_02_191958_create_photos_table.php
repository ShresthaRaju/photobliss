<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('photo_name');
            $table->string('title',50)->nullable();
            $table->text('story',500)->nullable();
            $table->string('make',100)->nullable();
            $table->string('model',100)->nullable();
            $table->string('aperture',10)->nullable();
            $table->string('exposure_time',10)->nullable();
            $table->string('focal_length',10)->nullable();
            $table->string('iso',10)->nullable();
            $table->string('location',100)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('photos');
    }
}
