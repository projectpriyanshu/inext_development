<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhlShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhl_shipments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dhl_from_id')->unsigned();
            $table->foreign('dhl_from_id')->references('id')->on('dhl_from_addresses');
            $table->string('shipment_date')->nullable();
            $table->string('schedule_courier_pickup')->nullable();
            $table->string('shipment_details')->nullable();
            $table->string('total')->nullable();
            $table->string('volumetric_weight')->nullable();
            $table->string('total_weight')->nullable();
            $table->string('chargeable_weight')->nullable();
            $table->enum('status',[0,1])->default(1)->comment('0=not default,1=default');
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
        Schema::dropIfExists('dhl_shipments');
    }
}
