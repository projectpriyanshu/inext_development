<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_amounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_customer_id')->unsigned();
            $table->foreign('payment_customer_id')->references('id')->on('customer_details');
            $table->string('amount')->nullable();
            $table->string('mode')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('bank_name')->nullable();
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
        Schema::dropIfExists('receipt_amounts');
    }
}
