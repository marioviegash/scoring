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
            $table->string('name');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->text('description');
            $table->string('criteria_group');
            $table->string('criteria_individu');
            $table->integer('maximum_score');
            $table->datetime('start_time');
            $table->integer('created_by')->unsigned();
            $table->boolean('shared_all');
            $table->timestamps();

            // $table->foreign('creator_id')->references('id')->on('users')
            // ->onUpdate('cascade')->onDelete('cascade');
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
