<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_managers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->string('finance_name')->nullable();
            $table->string('finance_contact')->nullable();
            $table->string('finance_email')->nullable();
            $table->string('authorized_name')->nullable();
            $table->string('authorized_contact')->nullable();
            $table->string('authorized_email')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('sales_contact')->nullable();
            $table->string('sales_email')->nullable();
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
        Schema::dropIfExists('customer_managers');
    }
}
