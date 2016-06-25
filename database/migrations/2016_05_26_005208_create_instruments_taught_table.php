<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumentsTaughtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruments_taught', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id');
            $table->boolean('violin');
            $table->boolean('viola');
            $table->boolean('cello');
            $table->boolean('double_bass');
            $table->boolean('harp');
            $table->boolean('guitar');
            $table->boolean('electric_guitar');
            $table->boolean('bass_guitar');
            $table->boolean('banjo_uke');
            $table->boolean('recorder');
            $table->boolean('flute');
            $table->boolean('piccolo');
            $table->boolean('clarinet');
            $table->boolean('oboe');
            $table->boolean('bassoon');
            $table->boolean('saxophone');
            $table->boolean('cornet');
            $table->boolean('trumpet');
            $table->boolean('tenor_horn');
            $table->boolean('euphonium');
            $table->boolean('trombone');
            $table->boolean('french_horn');
            $table->boolean('tuba');
            $table->boolean('piano');
            $table->boolean('harpsichord');
            $table->boolean('organ');
            $table->boolean('xylophone');
            $table->boolean('marimba');
            $table->boolean('drum_kit');
            $table->boolean('timpani');


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
        Schema::drop('instruments_repaired');
    }
}
