<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhlShipmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhl_shipment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dhl_from_id')->unsigned();
            $table->foreign('dhl_from_id')->references('id')->on('dhl_from_addresses');
            $table->string('shipment_details')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('shipment_purpose')->nullable();
            $table->string('tax_payment_option')->nullable();
            $table->string('create_invoice')->nullable();
            $table->string('use_own_invoice')->nullable();      
            $table->string('shipment_summary')->nullable();
            $table->string('shipment_invoice_no')->nullable();
            $table->string('total_value')->nullable();
            $table->string('total_invoice')->nullable();
            $table->string('charge1')->nullable();
            $table->string('charge2')->nullable();
            $table->string('charge3')->nullable();
            $table->string('shipment_reference')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('shipment_no')->nullable();
            $table->string('gst_invoice_no')->unique();
            $table->string('services_invoice_no')->unique();
            $table->string('gst_invoice_date')->nullable();
            $table->string('invoice_date')->nullable();    
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
        Schema::dropIfExists('dhl_shipment_details');
    }
}
