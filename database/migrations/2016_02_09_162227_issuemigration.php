<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Issuemigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_issue',function(Blueprint $table){
            $table->increments('id');
            $table->string('issue_name');
        });
        Schema::create('sub_issue',function(Blueprint $table){
            $table->increments('id');
            $table->integer('issue_id');
            $table->string('subissue_name');
        });
        Schema::create('user_enquries',function(Blueprint $table){
            $table->increments('id');
            $table->integer('subissue_id');
            $table->string('questions');
            $table->string('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('main_issue');
        Schema::drop('sub_issue');
        Schema::drop('user_enquries');
    }
}
