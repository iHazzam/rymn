<?php

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
            $table->integer('group_id')->unsigned();
            $table->string('concert_address_line1');
            $table->string('concert_address_line2')->nullable();
            $table->string('city', 30);
            $table->string('postcode', 7);
            $table->string('name');
            $table->date('date');
            $table->time('time');
            $table->decimal('ticket_cost', 5, 2);
            $table->longText('concert_details');
            $table->string('thumbnail_img')->nullable();
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
        Schema::drop('events');
    }
}
