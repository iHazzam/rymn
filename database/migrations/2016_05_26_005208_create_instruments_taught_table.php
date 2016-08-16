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
            $table->boolean('banjo');
            $table->boolean('ukelele');
            $table->boolean('sitar');
            $table->boolean('balalaika');
            $table->boolean('mandolin');
            $table->boolean('zither');
            $table->boolean('flute');
            $table->boolean('clarinet');
            $table->boolean('oboe');
            $table->boolean('bassoon');
            $table->boolean('recorder');
            $table->boolean('piccolo');
            $table->boolean('saxophone');
            $table->boolean('cor_anglais');
            $table->boolean('basset_horn');
            $table->boolean('bass_clarinet');
            $table->boolean('contra_bassoon');
            $table->boolean('bagpipes');
            $table->boolean('ocarina');
            $table->boolean('mouth_organ');
            $table->boolean('french_horn');
            $table->boolean('trumpet');
            $table->boolean('trombone');
            $table->boolean('tuba');
            $table->boolean('cornet');
            $table->boolean('flugel_horn');
            $table->boolean('tenor_horn');
            $table->boolean('baritone');
            $table->boolean('euphonium');
            $table->boolean('ophicleide');
            $table->boolean('sackbutt');
            $table->boolean('cornette');
            $table->boolean('serpent');
            $table->boolean('digeridoo');
            $table->boolean('timpani');
            $table->boolean('orchestral_percussion');
            $table->boolean('tuned_percussion');
            $table->boolean('drum_kit');
            $table->boolean('xylophone');
            $table->boolean('vibraphone');
            $table->boolean('glockenspiel');
            $table->boolean('cembalom');
            $table->boolean('marimba');
            $table->boolean('piano');
            $table->boolean('harpsichord');
            $table->boolean('keyboard');
            $table->boolean('organ');
            $table->boolean('male_singing');
            $table->boolean('female_singing');

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
        Schema::drop('instruments_taught');
    }
}
