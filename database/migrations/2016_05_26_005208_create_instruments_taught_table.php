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
            $table->string('other_string');
            $table->boolean('recorder');
            $table->boolean('flute');
            $table->boolean('piccolo');
            $table->boolean('clarinet');
            $table->boolean('oboe');
            $table->boolean('bassoon');
            $table->boolean('saxophone');
            $table->string('other_wind');
            $table->boolean('cornet');
            $table->boolean('trumpet');
            $table->boolean('tenor_horn');
            $table->boolean('euphonium');
            $table->boolean('trombone');
            $table->boolean('french_horn');
            $table->boolean('tuba');
            $table->string('other_brass');
            $table->boolean('piano');
            $table->boolean('harpsichord');
            $table->boolean('organ');
            $table->string('other_keys');
            $table->boolean('xylophone');
            $table->boolean('marimba');
            $table->boolean('drum_kit');
            $table->boolean('timpani');
            $table->string('other_percussion');
            $table->boolean('singing_classical');
            $table->boolean('singing_musical_theatre');
            $table->boolean('singing_jazz');
            $table->boolean('singing_pop');
            $table->boolean('singing_opera');
            $table->string('singing_other');
            $table->string('any_other');
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
