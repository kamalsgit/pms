<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
			$table->integer('project_id');
			$table->string('title');
			$table->string('description');
			$table->integer('task_type');
			$table->integer('priority');
			$table->integer('assignee');
			$table->integer('file_id');
			$table->bigInteger('start_date');
			$table->bigInteger('end_date');
			$table->string('task_status');
			$table->integer('is_deleted');
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
        Schema::dropIfExists('tasks');
    }
}
