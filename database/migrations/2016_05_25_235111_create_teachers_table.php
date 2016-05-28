<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 40);
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('city', 30);
            $table->string('postcode', 7);
            $table->string('email');
            $table->string('phone');
            $table->string('mobile');
            $table->string('instruments_played1');
            $table->string('instruments_played2');
            $table->string('instruments_played3');
            $table->string('instruments_played4');
            $table->enum('level_instrument1',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist']);
            $table->enum('level_instrument2',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist']);
            $table->enum('level_instrument3',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist']);
            $table->enum('level_instrument4',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist']);
            $table->string('qualification');
            $table->longText('performing_experience');
            $table->longText('teaching_experience');
            $table->integer('min_age_taught');
            $table->integer('max_age_taught');
            $table->boolean('teach_at_pupil_home');
            $table->boolean('teach_at_own_home');
            $table->boolean('teach_online');
            $table->boolean('teach_theory');
            $table->enum('theory_level',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma']);
            $table->boolean('teach_aural');
            $table->enum('aural_level',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma']);
            $table->boolean('teach_composition');
            $table->enum('composition_level',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','professional']);
            $table->boolean('teach_accompanying');
            $table->enum('accompanying_level',['beginner','intermediate','advanced','professional']);
            $table->boolean('is_accompanist');
            $table->enum('level_accompanied',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','professional']);
            $table->boolean('is_instrument_repairer');
            $table->boolean('crb_checked');
            $table->longText('biography');
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
        Schema::drop('teachers');
    }
}
