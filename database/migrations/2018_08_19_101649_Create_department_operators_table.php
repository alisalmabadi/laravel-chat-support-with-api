<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_operators', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->integer('operator_id')->unsigned();
        });
        Schema::table('department_operators', function (Blueprint $table) {
        $table->foreign('department_id')->references('id')->on('departments')->OnDelete('cascade');
        $table->foreign('operator_id')->references('id')->on('operators')->OnDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_operators');
    }
}
