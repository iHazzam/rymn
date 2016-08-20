<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWebsitesToThings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function ($table) {
            $table->string('website');
        });
        Schema::table('groups', function ($table) {
            $table->string('website');
        });
        Schema::table('repairers', function ($table) {
            $table->string('website');
        });
        Schema::table('teachers', function ($table) {
            $table->string('facebook');
        });
        Schema::table('groups', function ($table) {
            $table->string('facebook');
        });
        Schema::table('repairers', function ($table) {
            $table->string('facebook');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
