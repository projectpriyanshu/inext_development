<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFromAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('from_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipment_id')->unsigned();
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->string('sender')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_id')->nullable();
            $table->string('company')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('extension')->nullable();
            $table->enum('from_default', ['0', '1'])->default('0')->comment('0=not default,1=default');
            $table->enum('from_address_book', ['0', '1'])->default('0')->comment('0=not added in address book,1=added in addressbook');
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
        Schema::dropIfExists('from_addresses');
    }
}