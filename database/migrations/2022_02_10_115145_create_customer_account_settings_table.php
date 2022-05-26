<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAccountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_account_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->string('tariff')->nullable();
            $table->string('gst')->nullable();
            $table->string('activate')->nullable();
            $table->string('billing')->nullable();
            $table->string('auto_email')->nullable();
            $table->string('fuel_option')->nullable();
            $table->string('fuel_value')->nullable();
            $table->string('fuel_imp_option')->nullable();
            $table->string('fuel_imp_value')->nullable();
            $table->string('payment')->nullable();
            $table->string('currency')->nullable();
            $table->string('group_code1')->nullable();
            $table->string('group_code2')->nullable();
            $table->string('covid_charges')->nullable();
            $table->decimal('rate_markup',10,2)->default(0);
            $table->string('markup_type')->nullable();
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
        Schema::dropIfExists('customer_account_settings');
    }
}
