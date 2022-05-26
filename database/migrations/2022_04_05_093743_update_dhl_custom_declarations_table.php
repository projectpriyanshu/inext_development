<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDhlCustomDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dhl_custom_declarations', function (Blueprint $table) {
            $table->bigInteger('dhl_from_id')->unsigned();
            $table->foreign('dhl_from_id')->references('id')->on('dhl_from_addresses');
            $table->string('involved_other_party')->nullable();
            $table->string('shipment_tax_payment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dhl_custom_declarations', function (Blueprint $table) {
            $table->dropColumn('dhl_from_id');
            $table->dropColumn('involved_other_party');
            $table->dropColumn('shipment_tax_payment');
        });
    }
}
