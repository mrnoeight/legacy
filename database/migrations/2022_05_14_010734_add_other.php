<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            //
            $table->string('current-occupation-other', 255)->nullable();
            $table->string('work-considered-other', 255)->nullable();
            $table->string('role-considered-other', 255)->nullable();
            $table->string('past-exp-other', 255)->nullable();
            $table->string('speak-language-other', 255)->nullable();
            $table->string('ethnicity-other', 255)->nullable();
            $table->string('citizenship-other', 255)->nullable();
            $table->string('vocal-other', 255)->nullable();
            $table->string('instruments-other', 255)->nullable();
            $table->string('tattoos-other', 255)->nullable();
            $table->string('sports-other', 255)->nullable();
            $table->string('dancing-other', 255)->nullable();
            $table->string('martial-other', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            //
        });
    }
}
