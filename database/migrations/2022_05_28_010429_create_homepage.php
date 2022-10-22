<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage', function (Blueprint $table) {
            $table->id();
            $table->string('head_tag1', 255)->nullable();
            $table->string('head_title1', 255)->nullable();
            $table->string('head_desc1', 255)->nullable();
            $table->string('mid_tag1', 255)->nullable();
            $table->string('mid_title1', 255)->nullable();
            $table->string('mid_desc1', 255)->nullable();
            $table->string('info1', 255)->nullable();
            $table->string('info2', 255)->nullable();
            $table->string('info3', 255)->nullable();
            $table->string('info4', 255)->nullable();
            $table->string('info5', 255)->nullable();
            $table->string('page_name', 255)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_author', 255)->nullable();
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
        Schema::dropIfExists('homepage');
    }
}
