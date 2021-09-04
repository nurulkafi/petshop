<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_category_id');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->text('name');
            $table->text('description');
            $table->text('status');
            $table->integer('stock');
            $table->timestamps();
            $table->foreign('pet_category_id')->references('id')->on('pet_category');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet');
    }
}
