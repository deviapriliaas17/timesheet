<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAbsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_absents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_absents_code');
            $table->string('project_location_employee_code');
            $table->integer('mandays')->nullable();
            $table->integer('workdays')->nullable();
            $table->string('note');
            $table->date('date')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('project_absents');
    }
}
