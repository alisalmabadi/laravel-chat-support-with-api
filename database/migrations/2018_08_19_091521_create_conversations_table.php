<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('company_token');
            $table->integer('department_id')->unsigned();
            $table->integer('operator_id')->nullable()->unsigned();
            $table->integer('end_conv')->default(0);
            $table->string('subject');
            $table->text('token');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::table('conversations',function (Blueprint $table){
/*           $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');*/
           $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
