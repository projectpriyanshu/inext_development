<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelSettingImportMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_setting_import_masters', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('network')->nullable();
            $table->string('amount')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
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
        Schema::dropIfExists('fuel_setting_import_masters');
    }
}
