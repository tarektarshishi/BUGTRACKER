<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelhasproject', function (Blueprint $table) {
            $table->unsignedBigInteger('projectid');
            $table->foreign('projectid')->references('id')->on('projects');
            $table->unsignedBigInteger('modelid');
            $table->foreign('modelid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelhasproject');
    }
}
