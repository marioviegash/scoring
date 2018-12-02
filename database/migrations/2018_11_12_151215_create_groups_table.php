<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('group_status_id')->default(0);
            $table->integer('event_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->integer('approve_by')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('logo');
            
            $table->timestamp('approve_at')->nullable();
            $table->timestamps();
            
            $table->foreign('creator_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('event_id')->references('id')->on('events')
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
        Schema::table('groups', function (Blueprint $table) {
            //
        });
    }
}
