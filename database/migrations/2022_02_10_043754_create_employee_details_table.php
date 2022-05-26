<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('address');
            $table->string('city_id');
            $table->string('state_id');
            $table->string('branch_id');
            $table->string('pincode');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('voter_id')->unique();
            $table->string('aadhar_no')->unique();
            $table->string('pan_no')->unique();
            $table->string('bank_name');
            $table->string('account_no')->unique();
            $table->string('ifsc_code');
            $table->string('bank_address');
            $table->date('dob');
            $table->date('doj');
            $table->string('department');
            $table->string('material');
            $table->enum('gender',['male','female','other']);
            $table->string('education');
            $table->string('payment');
            $table->string('uan_no')->unique();
            $table->string('annual_salary');
            $table->string('photo_path');
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
        Schema::dropIfExists('employee_details');
    }
}
