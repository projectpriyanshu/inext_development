<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailnotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailnotifications', function (Blueprint $table) {
            $table->id();
            $table->string('sender_smtp')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('sender_email')->nullable();
            $table->enum('checkbox',['0','1'])->default('0')->comment('0=not default,1=default');
            $table->string('smtp_port')->nullable();
            $table->string('sender_password')->nullable();
            $table->string('additional_cc')->nullable();
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
        Schema::dropIfExists('emailnotifications');
    }
}
