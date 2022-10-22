<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddtributesToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            //
            $table->string('company_email', 150)->nullable();
            $table->string('website', 150)->nullable();
            $table->string('establish_date', 150)->nullable();
            $table->integer('number_pj_monthly')->nullable();
            $table->integer('number_pj_annually')->nullable();
            $table->string('feature_film_pj', 255)->nullable();
            $table->string('broadcast_pj', 255)->nullable();
            $table->string('music_video_pj', 255)->nullable();
            $table->string('film_ott_pj', 255)->nullable();
            $table->string('tv_ott_pj', 255)->nullable();
            $table->string('web_dramma_pj', 255)->nullable();
            $table->string('tvc_pj', 255)->nullable();
            $table->string('excutive_producer_name', 255)->nullable();
            $table->string('director_name', 255)->nullable();
            $table->string('producer_name', 255)->nullable();
            $table->string('cast_name', 255)->nullable();
            $table->string('cast_email', 255)->nullable();
            $table->string('cast_phone', 255)->nullable();
            $table->string('cast_time', 255)->nullable();
            $table->string('know_us', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            //
        });
    }
}
