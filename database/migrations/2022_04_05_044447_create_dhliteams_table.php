<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhliteamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhliteams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dhl_from_id')->unsigned();
            $table->foreign('dhl_from_id')->references('id')->on('dhl_from_addresses');
            $table->string('item_description')->nullable();
            $table->string('item_quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('item_value')->nullable();
            $table->string('commodity_code')->nullable();
            $table->string('net_weight')->nullable();
            $table->string('gross_weight')->nullable();
            $table->string('item_made_place')->nullable();
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
        Schema::dropIfExists('dhliteams');
    }
}
