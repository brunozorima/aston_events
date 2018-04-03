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
            $table->string('event_name');
            $table->string('category');
            $table->string('description');
            $table->string('organiser');
            $table->date('date');
            $table->time('start_at');
            $table->time('end_at');
//            $table->foreign('organiser')
//                ->references('name')
//                ->on('users')
//                ->onDelete('CASCADE');
            $table->string('contact');
            $table->string('location');
            $table->timestamps();
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