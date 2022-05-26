<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipment_id')->unsigned();
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->string('sender')->nullable();
            $table->string('to_contact_id')->nullable();
            $table->string('to_country')->nullable();
            $table->string('to_company')->nullable();
            $table->string('to_contact_name')->nullable();
            $table->string('to_address1')->nullable();
            $table->string('to_address2')->nullable();
            $table->string('to_post_code')->nullable();
            $table->string('to_city')->nullable();
            $table->string('to_state')->nullable();
            $table->string('to_phone_no')->nullable();
            $table->string('to_extension')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('vat_no')->nullable();
            $table->enum('is_residential', ['0', '1'])->default('0')->comment('0=no,1=yes');
            $table->enum('to_address_book', ['0', '1'])->default('0')->comment('0=not added in addresss book,1=added in address book');
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
        Schema::dropIfExists('to_addresses');
    }
}

