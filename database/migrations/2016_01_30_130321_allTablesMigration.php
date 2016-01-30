<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTablesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_in',function(Blueprint $table){
            $table->increments('id');
            $table->string('who');
            $table->dateTime('DateTime');
            $table->dateTime('server_time');
        });

        Schema::create('enquiry_user',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('truckjee_id')->nullable();
        });
        
        Schema::create('enquiry_open',function(Blueprint $table){
            $table->increments('id');
            $table->integer('enquiry_user_id')->unsigned();
            $table->string('remarks',2500);
            $table->integer('issue_id')->unsigned();
            $table->dateTime('in_time');
            $table->dateTime('responded_time');
        });

        Schema::create('enquiry_close',function(Blueprint $table){
            $table->increments('id');
            $table->integer('enquiry_user_id')->unsigned();
            $table->string('remarks',2500);
            $table->integer('issue_id')->unsigned();
            $table->dateTime('in_time');
            $table->dateTime('responded_time');
        });

        Schema::table('enquiry_open',function($table){
            $table->foreign('enquiry_user_id')->references('id')->on('enquiry_user');
        });

        Schema::table('enquiry_close',function($table){
            $table->foreign('enquiry_user_id')->references('id')->on('enquiry_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_in');
        Schema::drop('enquiry_user');
        Schema::drop('enquiry_open');
        Schema::drop('enquiry_close');
    }
}
