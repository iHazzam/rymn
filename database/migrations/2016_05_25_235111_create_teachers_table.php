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
            $table->string('address_line2')->nullable();
            $table->string('city', 30);
            $table->string('postcode', 7);
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('instruments_played1');
            $table->string('instruments_played2')->nullable();
            $table->string('instruments_played3')->nullable();
            $table->string('instruments_played4')->nullable();
            $table->enum('level_min_instrument1',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist']);
            $table->enum('level_min_instrument2',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->enum('level_min_instrument3',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->enum('level_min_instrument4',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->enum('level_max_instrument1',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist']);
            $table->enum('level_max_instrument2',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->enum('level_max_instrument3',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->enum('level_max_instrument4',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->string('qualification');
            $table->longText('performing_experience');
            $table->longText('teaching_experience');
            $table->integer('min_age_taught');
            $table->integer('max_age_taught');
            $table->boolean('teach_at_pupil_home');
            $table->boolean('teach_at_own_home');
            $table->boolean('teach_online');
            $table->boolean('teach_at_school');
            $table->boolean('teach_theory');
            $table->enum('theory_level',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma'])->nullable();
            $table->boolean('teach_aural');
            $table->enum('aural_level',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma'])->nullable();
            $table->boolean('teach_composition');
            $table->enum('composition_level',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','professional'])->nullable();
            $table->boolean('is_accompanist');
            $table->enum('level_accompanied',['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','professional'])->nullable();
            $table->boolean('is_instrument_repairer');
            $table->boolean('crb_checked');
            $table->longText('biography')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->longText('instruments_repaired')->nullable();
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
