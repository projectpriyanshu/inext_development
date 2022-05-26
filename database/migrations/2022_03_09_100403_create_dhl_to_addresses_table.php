<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhlToAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhl_to_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dhl_from_id')->unsigned();
            $table->foreign('dhl_from_id')->references('id')->on('dhl_from_addresses');
            $table->string('to_name')->nullable();
            $table->string('to_business_contact')->nullable();
            $table->string('to_company')->nullable();
            $table->string('to_country')->nullable();
            $table->string('to_state')->nullable();
            $table->string('to_city')->nullable();
            $table->string('to_email')->nullable();
            $table->string('to_phone_type')->nullable();
            $table->string('to_code')->nullable();
            $table->string('to_phone')->nullable();
            $table->enum('to_sms_enabled', ['0', '1'])->default('0')->comment('0=not default,1=default');
            $table->enum('to_residential_address', ['0', '1'])->default('0')->comment('0=not default,1=default');
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
        Schema::dropIfExists('dhl_to_addresses');
    }
}
