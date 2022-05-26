<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhlPackagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhl_packagings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dhl_from_id')->unsigned();
            $table->foreign('dhl_from_id')->references('id')->on('dhl_from_addresses');
            $table->string('packaging_type')->nullable();
            $table->string('quantity')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('breadth')->nullable();
            $table->string('height')->nullable();
            $table->string('transportation_charges')->nullable();
            $table->string('ship_from_address')->nullable();
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
        Schema::dropIfExists('dhl_packagings');
    }
}
