<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsFromShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups_from_shipments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ups_shipment_id')->unsigned();
            $table->foreign('ups_shipment_id')->references('id')->on('ups_shipments');
            $table->string('address_books')->nullable();
            $table->string('company')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('email_id')->nullable();
            $table->string('country_name')->nullable();
            $table->string('town')->nullable();
            $table->string('postal_code1')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('address_line3')->nullable();
            $table->string('telephone1')->nullable();
            $table->string('ext1')->nullable();
            $table->enum('resident',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->string('add_information')->nullable();
            $table->string('select_add')->nullable();
            $table->string('address_book_save')->nullable();
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
        Schema::dropIfExists('ups_from_shipments');
    }
}
