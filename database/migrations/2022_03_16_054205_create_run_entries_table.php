<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_entries', function (Blueprint $table) {
            $table->id();
            $table->string('run_no')->nullable();
            $table->string('sector')->nullable();
            $table->string('counter')->nullable();
            $table->string('flight_date')->nullable();
            $table->string('flight')->nullable();
            $table->string('flight_no')->nullable();
            $table->string('obc')->nullable();
            $table->string('AL-MawbNo')->nullable();
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
        Schema::dropIfExists('run_entries');
    }
}
