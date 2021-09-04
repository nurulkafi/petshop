<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->text('small');
            $table->text('medium');
            $table->text('large');
            $table->text('extra_large');
            $table->timestamps();
            $table->foreign('pet_id')->references('id')->on('pet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_image');
    }
}
