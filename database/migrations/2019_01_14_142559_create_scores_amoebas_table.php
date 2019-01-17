<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresAmoebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores_amoebas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amoeba_id')->unsigned();
            $table->integer('score_by')->unsigned();
            $table->integer('score');
            $table->string('criteria_update')->nullable();
            $table->integer('criteria_update_by')->unsigned();
            $table->timestamps();
            
            $table->foreign('amoeba_id')->references('id')->on('amoebas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('score_by')->references('id')->on('juries')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('criteria_update_by')->references('id')->on('admin_amoebas')
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
        Schema::dropIfExists('scores_amoebas');
    }
}
