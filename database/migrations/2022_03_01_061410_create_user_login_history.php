<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->datetime('login_at')->nullable();
            $table->datetime('logout_at')->nullable();
            $table->string('login_ip')->nullable();
            $table->string('session_id');
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
        Schema::dropIfExists('user_login_history');
    }
}
