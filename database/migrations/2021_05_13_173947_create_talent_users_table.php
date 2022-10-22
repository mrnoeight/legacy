<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_users', function (Blueprint $table) {
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
            $table->string('socials', 255)->nullable();
            $table->string('searching_for', 255)->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->string('file_cv', 255)->nullable();
            $table->tinyInteger('weight')->nullable();
            $table->tinyInteger('height')->nullable();
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
        Schema::dropIfExists('talent_users');
    }
}
