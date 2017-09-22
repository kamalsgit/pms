<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id');
			$table->bigInteger('start');
            $table->bigInteger('end');
            $table->string('reason');
            $table->integer('status');
            $table->integer('leave_type');
            $table->integer('permission_type');
            $table->integer('is_approved');
            $table->integer('approved_by');
            $table->bigInteger('approved_on');
			$table->integer('is_cancelled');
            $table->integer('cancelled_by');
			$table->string('cancelled_reason');
            $table->bigInteger('cancelled_on');
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
        //
    }
}
