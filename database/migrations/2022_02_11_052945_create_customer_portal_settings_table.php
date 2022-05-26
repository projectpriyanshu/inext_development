<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPortalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_portal_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->enum('setting_status', ['0', '1'])->default(0)->comment('0=Disabled,1=Enabled');
            $table->string('password')->nullable();
            $table->string('access_for_lable')->nullable();
            $table->string('company')->nullable();
            $table->integer('from_stock')->default(0);
            $table->string('awb_no')->nullable();
            $table->integer('to_stock')->default(0);
            $table->longText('stock_note')->nullable();
            $table->string('fedex_account_access')->nullable();
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
        Schema::dropIfExists('customer_portal_settings');
    }
}
