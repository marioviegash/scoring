<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('juri_id')->unsigned();
            $table->string('name');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->text('description');
            $table->integer('maximum_score');
            $table->timestamps();

            
            $table->foreign('juri_id')->references('id')->on('juries')
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
        Schema::dropIfExists('events');
    }
}