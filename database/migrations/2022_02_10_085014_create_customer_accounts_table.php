<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('serial_no1')->nullable();
            $table->string('serial_no2')->nullable();
            $table->string('business_type')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('iec_no')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->enum('status', ['0', '1', '2'])->default(0)->comment('0=disable,1=enable,2=deleted');
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
        Schema::dropIfExists('customer_accounts');
    }
}
