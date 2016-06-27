<?php

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
            $table->increments('id');
            $table->string('group_name');
            $table->string('group_town');
            $table->longText('group_description');
            $table->string('image1_path')->nullable();
            $table->string('image2_path')->nullable();
            $table->string('thumbnail_image_path');
            $table->enum('ensemble_type',['brass_band','choir','community_group','orchestra','percussion_ensemble','pop/rock_band','string_chamber_group','string_group','wind_band','wind_chamber_group']);
            $table->boolean('recruiting');
            $table->enum('minimum_level', ['grade1','grade2','grade3','grade4','grade5','grade6','grade7','grade8','diploma','concert_soloist'])->nullable();
            $table->boolean('audition')->nullable();
            $table->longText('recruit_details')->nullable();
            $table->string('contact_email');
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
        Schema::drop('groups');
    }
}
