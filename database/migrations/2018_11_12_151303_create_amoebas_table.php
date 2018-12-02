<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmoebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amoebas', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->string('NIK')->unique()->nullable();
            $table->string('picture')->nullable();
            $table->string('loker')->nullable();
            $table->string('work_place')->nullable();
            $table->string('c_level')->nullable();
            $table->boolean('verified')->default(false);

            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->foreign('group_id')->references('id')->on('groups')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amoebas', function (Blueprint $table) {
            //
        });
    }
}
