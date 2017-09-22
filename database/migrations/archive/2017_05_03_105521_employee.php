<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('employees', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('name');
            $table->string('gender');
            $table->string('personal_email');
            $table->string('business_email');
            $table->string('password');
            $table->string('personal_skype');
            $table->string('business_skype');
            $table->bigInteger('phone_number');
            $table->bigInteger('birthday');
            $table->bigInteger('dateofjoin');
            $table->string('perment_address');
            $table->string('current_address');
			$table->integer('is_married')->default(0);
			$table->string('partner_name')->nullable();
			$table->bigInteger('partner_phone')->nullable();
			$table->bigInteger('anniversary')->nullable();
			$table->integer('role_id');
			$table->integer('is_deleted')->default(0);
            $table->timestamps();
			$table->string('remember_token')->nullable();
			//$table->foreign('role_id')->references('role_id')->on('roles');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
