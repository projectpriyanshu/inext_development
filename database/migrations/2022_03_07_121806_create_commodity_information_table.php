<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommodityInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipment_id')->unsigned();
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->longText('description')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('weight',10,2)->nullable();
            $table->decimal('custom_value',10,2)->nullable();
            $table->string('country_of_manufacturer')->nullable();
            $table->string('harmonized_code')->nullable();
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
        Schema::dropIfExists('commodity_information');
    }
}
