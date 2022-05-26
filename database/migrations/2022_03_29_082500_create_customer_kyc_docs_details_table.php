<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerKycDocsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_kyc_docs_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kyc_docs_id')->unsigned();
            $table->foreign('kyc_docs_id')->references('id')->on('customer_kyc_documents');
            $table->string('document')->nullable();
            $table->string('kyc_no')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('customer_kyc_docs_details');
    }
}
