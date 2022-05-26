<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipment_id')->unsigned();
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->string('none_standard_packaging')->nullable();
            $table->string('battery')->nullable();
            $table->string('select_broker')->nullable();
            $table->string('broker_accno')->nullable();
            $table->string('broker_company_name')->nullable();
            $table->string('broker_contact_name')->nullable();
            $table->string('broker_address1')->nullable();
            $table->string('broker_address2')->nullable();
            $table->string('broker_post_code')->nullable();
            $table->string('broker_city')->nullable();
            $table->string('broker_state')->nullable();
            $table->string('broker_country')->nullable();
            $table->string('broker_phone_no')->nullable();
            $table->string('broker_tax_id')->nullable();
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
        Schema::dropIfExists('special_services');
    }
}
