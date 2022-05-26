<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatesPickUps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pick_ups', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('from_date');
            $table->dropColumn('to_date');
            $table->dropColumn('time');
            $table->dropColumn('city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pick_ups', function (Blueprint $table) {
            //
        });
    }
}
