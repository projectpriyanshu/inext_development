<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsShipmentProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups_shipment_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ups_shipment_id')->unsigned();
            $table->foreign('ups_shipment_id')->references('id')->on('ups_shipments');
            $table->string('packages')->nullable();
            $table->string('same_packages')->nullable();
            $table->string('packages_type')->nullable();
            $table->string('shipment_weight')->nullable();
            $table->string('packages_dimensions')->nullable();
            $table->string('shipment_value')->nullable();
            $table->string('large_packages')->nullable();
            $table->string('packages_include_batteries')->nullable(); 
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
        Schema::dropIfExists('ups_shipment_products');
    }
}
