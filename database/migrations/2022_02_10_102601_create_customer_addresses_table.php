<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->string('contact_person')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->string('city_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state_code')->nullable();
            $table->string('state')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('branch')->nullable();
            $table->string('telephone')->nullable();
            $table->string('cs_email')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
}
