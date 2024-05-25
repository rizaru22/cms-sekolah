<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageJurusansTable extends Migration
{
    public function up()
    {
        Schema::create('image_jurusans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('major_id');
            $table->string('image_carousel')->nullable();   
            $table->timestamps();

            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('image_jurusans');
    }
}
