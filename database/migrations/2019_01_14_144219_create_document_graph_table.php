<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentGraphTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_graphs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amoeba_id')->unsigned();
            $table->string('name');
            $table->string('path');
            $table->timestamps();
            
            $table->foreign('amoeba_id')->references('id')->on('amoebas')
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
        Schema::dropIfExists('document_graphs');
    }
}
