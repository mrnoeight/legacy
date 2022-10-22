<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prole_registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prole_id');
            $table->foreign('prole_id')
                ->references('id')
                ->on('proles')
                ->onDelete('cascade');
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')
                ->references('id')
                ->on('registrations')
                ->onDelete('cascade');
            $table->string('status', 150)->nullable();
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
        Schema::dropIfExists('registration_role');
    }
}
