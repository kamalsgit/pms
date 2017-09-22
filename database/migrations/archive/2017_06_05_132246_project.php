<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('project', function (Blueprint $table) {
		$table->increments('project_id');
		$table->string('title');
		$table->text('description');
		$table->string('project_state');
		$table->int('file_id');
		$table->int('team_id');
		$table->string('start_date');
		$table->string('end_date');
		$table->int('is_deleted');
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
