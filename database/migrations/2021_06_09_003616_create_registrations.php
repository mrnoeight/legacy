<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('hometown', 150)->nullable();
            $table->date('birthday')->nullable();
            $table->string('current_career', 255)->nullable();
            $table->boolean('has_agency')->nullable();
            $table->string('agency_name', 255)->nullable();
            $table->boolean('want_agency')->default(false);
            $table->string('your_experience', 255)->nullable();
            $table->string('searching_for', 255)->nullable();
            $table->string('youtube_link', 255)->nullable();
            $table->string('facebook_link', 255)->nullable();
            $table->string('instagram_link', 255)->nullable();
            $table->string('tiktok_link', 255)->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('type')->nullable();
            $table->integer('status')->nullable();
            $table->boolean('enabled')->default(false);
            $table->text('bio')->nullable();
            $table->date('published_at')->nullable();
            $table->string('username', 150)->nullable();
            $table->string('password', 255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('registrations');
    }
}
