<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_customer_id')->unsigned();
            $table->foreign('payment_customer_id')->references('id')->on('customer_details');
            $table->string('receipt_type')->nullable();
            $table->string('debit_amt')->nullable();
            $table->string('credit_amt')->nullable();
            $table->string('debit_no')->nullable();
            $table->string('credit_no')->nullable();
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
        Schema::dropIfExists('credit_details');
    }
}
