<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_customer_id')->unsigned();
            $table->foreign('payment_customer_id')->references('id')->on('customer_details');
            $table->string('opening_balance')->nullable();
            $table->string('total_sales')->nullable();
            $table->string('total_receipt')->nullable();
            $table->string('total_debit')->nullable();
            $table->string('total_credit')->nullable();
            $table->string('total_balance')->nullable();
            $table->string('remark')->nullable();
            $table->string('verify_remark')->nullable();
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
        Schema::dropIfExists('summaries');
    }
}
