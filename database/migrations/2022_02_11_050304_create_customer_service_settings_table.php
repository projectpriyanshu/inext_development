<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServiceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_service_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->enum('all', ['0', '1'])->default(0)->comment('0=not checked,1=checked');
            $table->string('service_network')->nullable();
            $table->string('service_setting')->nullable();
            $table->longText('service_note')->nullable();
            $table->enum('vol_discount_status', ['0', '1'])->default(0)->comment('0=enabled,1=Disabled');
            $table->string('sector')->nullable();
            $table->string('service')->nullable();
            $table->decimal('weight',10,2)->default(0);
            $table->decimal('vol_discount',10,2)->default(0);
            $table->longText('vol_discount_note')->nullable();
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
        Schema::dropIfExists('customer_service_settings');
    }
}
