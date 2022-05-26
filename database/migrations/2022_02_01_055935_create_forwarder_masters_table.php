<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForwarderMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forwarder_masters', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('city_id');
            $table->string('state_id');
            $table->string('pincode');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('website')->unique();
            $table->string('bank_name');
            $table->string('account_no')->unique();
            $table->string('ifsc_code');
            $table->string('bank_address');
            $table->string('gst_no')->unique();
            $table->string('pan_no')->unique();
            $table->string('cin_no')->unique();
            $table->enum('status',[0,1])->default(1);
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
        Schema::dropIfExists('forwarder_masters');
    }
}
