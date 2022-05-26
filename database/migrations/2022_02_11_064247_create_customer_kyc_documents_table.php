<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerKycDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_kyc_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->string('document')->nullable();
            $table->string('kyc_no')->nullable();
            $table->string('image')->nullable();
            $table->enum('is_verified',['0','1'])->default(0)->comment('1=verified,0=not verified');
            $table->string('verify_by')->nullable();
            $table->timestamp('verify_date_time')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('open_by')->nullable();
            $table->string('modify_by')->nullable();
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
        Schema::dropIfExists('customer_kyc_documents');
    }
}
