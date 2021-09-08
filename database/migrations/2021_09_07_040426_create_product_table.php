<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->text('name');
            $table->text('detail');
            $table->integer('stock');  
            $table->double('vendor_price');
            $table->double('retail_price');
            $table->double('discount')->nullable();   
            $table->text('status');     
            $table->foreign('product_category_id')->references('id')->on('product_category');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('product');
    }
}
