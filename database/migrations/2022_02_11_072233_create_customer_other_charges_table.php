<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOtherChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_other_charges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->string('customer_name')->nullable();
            $table->string('origin')->nullable();
            $table->string('forwarder')->nullable();
            $table->string('service')->nullable();
            $table->string('service_code')->nullable();
            $table->string('value')->nullable();
            $table->date('from_date')->nullable();
            $table->string('charge_dec1')->nullable();
            $table->string('charge_dec2')->nullable();
            $table->string('destination')->nullable();
            $table->string('destination_code')->nullable();
            $table->string('network')->nullable();
            $table->string('network_code')->nullable();
            $table->string('charges_type')->nullable();
            $table->integer('min_value')->default(0);
            $table->date('to_date')->nullable();
            $table->longText('charges_note')->nullable();
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
        Schema::dropIfExists('customer_other_charges');
    }
}
