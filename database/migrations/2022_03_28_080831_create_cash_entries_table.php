<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('awb_no')->nullable();
            $table->string('customer_id')->nullable();
            $table->text('consignor')->nullable();
            $table->text('address')->nullable();;
            $table->decimal('cash_amount', 10, 2)->default(0)->nullable();
            $table->decimal('received_mt', 10, 2)->default(0)->nullable();
            $table->integer('recover')->nullable();
            $table->bigInteger('refund')->nullable();;
            $table->date('receive_date')->nullable();
            $table->bigInteger('rcpt_no')->nullable();
            $table->decimal('balance', 10, 2)->default(0)->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('cash_entries');
    }
}
