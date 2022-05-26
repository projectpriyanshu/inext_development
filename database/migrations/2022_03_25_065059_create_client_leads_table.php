<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_leads', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('client_type')->nullable();
            $table->date('email_sent_date')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('docs')->nullable();
            $table->enum('status',['Prospect','Draft','Negotiate','Approved','Closed'])->nullable();
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
        Schema::dropIfExists('client_leads');
    }
}
