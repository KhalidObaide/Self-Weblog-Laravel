<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       	Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
	    $table->string('intro');
	    $table->string('time_added');
	    $table->string('username');
	    $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
