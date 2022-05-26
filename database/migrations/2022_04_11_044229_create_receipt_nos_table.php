<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_nos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_customer_id')->unsigned();
            $table->foreign('payment_customer_id')->references('id')->on('customer_details');
            $table->string('receipt_no')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('receipt_nos');
    }
}
