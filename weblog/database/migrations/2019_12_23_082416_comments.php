<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('comments', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('name');
		$table->string('email');
		$table->string('comment');
		$table->string('time_added');
		$table->string('to');
	});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('comments');
    }
}
