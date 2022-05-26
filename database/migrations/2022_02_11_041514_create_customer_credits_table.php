<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_credits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->enum('credit_status', ['0', '1'])->default(0)->comment('0=disable,1=enable');
            $table->decimal('opening_balance',10,2)->default(0);
            $table->decimal('credit_limit',10,2)->default(0);
            $table->decimal('credit_balance',10,2)->default(0);
            $table->enum('notify', ['0', '1'])->default(0)->comment('0=checked,1=notchecked');
            $table->decimal('total_sale',10,2)->default(0);
            $table->decimal('total_payment',10,2)->default(0);
            $table->decimal('total_debit_note',10,2)->default(0);
            $table->decimal('total_credit_note',10,2)->default(0);
            $table->decimal('outstanding',10,2)->default(0);
            $table->string('network')->nullable();
            $table->string('divisible')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('customer_credits');
    }
}
