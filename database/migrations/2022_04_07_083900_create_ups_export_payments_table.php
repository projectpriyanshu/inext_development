<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsExportPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups_export_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ups_shipment_id')->unsigned();
            $table->foreign('ups_shipment_id')->references('id')->on('ups_shipments');
            $table->string('payment_method')->nullable();
            $table->string('promotion_code1')->nullable();
            $table->string('taxes')->nullable();
            $table->string('ups_account_no')->nullable();
            $table->string('territory')->nullable();
            $table->string('postal_code2')->nullable();
            $table->enum('schedule_collection',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->enum('tearm_and_condition',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->enum('paperless_shipment',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->enum('export_form',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->string('comercial_invoice')->nullable();
            $table->enum('form_history',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->enum('export_document',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->enum('completing_shipment',['0','1'])->default('0')->comment('0=not default,1=default');
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
        Schema::dropIfExists('ups_export_payments');
    }
}
