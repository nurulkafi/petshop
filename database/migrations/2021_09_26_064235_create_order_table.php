<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('no_ref')->unique();
            $table->string('status');
            $table->datetime('order_date');
            $table->datetime('payment_due');
            $table->string('payment_status');
            $table->string('payment_token')->nullable();
            $table->string('payment_url')->nullable();
            $table->double('base_total_price')->default(0);
            $table->double('shipping_cost')->default(0);
            $table->double('grand_total')->default(0);
            $table->text('note')->nullable();
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_address')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_city_id')->nullable();
            $table->string('customer_province_id')->nullable();
            $table->string('shipping_courier')->nullable();
            $table->string('shipping_service_name')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->datetime('cancelled_at')->nullable();
            $table->text('cancellation_note')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('cancelled_by')->references('id')->on('users');
            $table->index('no_ref');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
