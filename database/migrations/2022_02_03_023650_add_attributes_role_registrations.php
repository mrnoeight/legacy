<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesRoleRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prole_registration', function (Blueprint $table) {
            //
            $table->string('location', 255)->nullable();
            $table->string('photo_list', 255)->nullable();
            $table->string('video_list', 255)->nullable();
            $table->text('talent_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prole_registration', function (Blueprint $table) {
            //
        });
    }
}
