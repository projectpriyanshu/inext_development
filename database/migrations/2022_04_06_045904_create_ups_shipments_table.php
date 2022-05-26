<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups_shipments', function (Blueprint $table) {
            $table->id();
            $table->string('Awb_No')->nullable();
            $table->string('address_book')->nullable();
            $table->string('new_address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('telephone')->nullable();
            $table->string('ext')->nullable();
            $table->enum('resident_address',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->string('save_address')->nullable();
            $table->string('address_book1')->nullable();
            $table->enum('access_point',['0','1'])->default('0')->comment('0=not default,1=default');
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
        Schema::dropIfExists('ups_shipments');
    }
}
