<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipment_id')->unsigned();
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->date('ship_date')->nullable();
            $table->integer('packages_no')->default(0);
            $table->decimal('weight',10,2)->default(0);
            $table->string('weight_unit')->nullable();
            $table->integer('package_value')->default(0);
            $table->string('package_value_unit')->nullable();
            $table->string('service_type')->nullable();
            $table->string('package_type')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('shipment_purpose')->nullable();
            $table->integer('custom_value')->default(0);
            $table->string('custom_value_unit')->nullable();
            $table->string('bill_transportation_to')->nullable();
            $table->string('taxes')->nullable();
            $table->string('account_no')->nullable();
            $table->string('po_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('dept_no')->nullable();
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
        Schema::dropIfExists('shipment_details');
    }
}
