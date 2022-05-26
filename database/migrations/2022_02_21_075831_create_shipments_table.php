<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('sender')->nullable();
            $table->date('ship_date')->nullable();
            $table->decimal('total_shipment_weight', 10, 2)->default(0)->nullable;
            $table->decimal('total_carrige_value', 10, 2)->default(0)->nullable;
            $table->enum('status', ['0', '1'])->default('0')->comment('0=active,1=inactive');
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
        Schema::dropIfExists('shipments');
    }
}
