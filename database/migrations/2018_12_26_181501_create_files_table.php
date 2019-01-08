<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->integer('group_id')->unsigned();
            $table->integer('saved_by')->unsigned();
            $table->datetime('approve_at');
            $table->datetime('review_at');
            $table->timestamps();
            
            $table->foreign('saved_by')->references('id')->on('users')
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
        Schema::dropIfExists('Files');
    }
}
