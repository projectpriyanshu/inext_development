<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhlFromAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhl_from_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('awb_no')->unique();
            $table->string('from_name')->nullable();
            $table->string('from_company')->nullable();
            $table->string('from_country')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('from_state')->nullable();
            $table->string('from_city')->nullable();
            $table->string('from_email')->nullable();
            $table->string('from_phone_type')->nullable();
            $table->string('from_code')->nullable();
            $table->string('from_phone')->nullable();
            $table->enum('from_sms_enabled', ['0', '1'])->default('0')->comment('0=not default,1=default');
            $table->string('iec_no')->nullable();
            $table->string('india_tax_id')->nullable();
            $table->string('number')->nullable();
            $table->string('dhl_transporter_id')->nullable();
            $table->enum('from_residential_address',['0','1'])->default('0')->comment('0=not default,1=default');
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
        Schema::dropIfExists('dhl_from_addresses');
    }
}
