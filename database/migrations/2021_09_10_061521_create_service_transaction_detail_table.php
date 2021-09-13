<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_transaction_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_transaction_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
            $table->foreign('service_transaction_id')->references('id')->on('service_transaction');
            $table->foreign('service_id')->references('id')->on('service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_transaction_detail');
    }
}
