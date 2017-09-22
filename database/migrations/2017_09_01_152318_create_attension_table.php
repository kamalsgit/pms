<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attension', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('emp_id');
			$table->integer('task_id');
			$table->integer('lead_id');
			$table->integer('reply_to');
			$table->integer('is_watched');
			$table->integer('watched_date');
			$table->string('attension');
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
        Schema::dropIfExists('attension');
    }
}
