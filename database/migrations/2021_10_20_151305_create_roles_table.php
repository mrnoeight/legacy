<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->bigInteger('post_id')->nullable();
            $table->bigInteger('company_id')->nullable();
            $table->string('role_type')->nullable();
            $table->string('role_requirement')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('age_range')->nullable();
            $table->integer('role_fee_min')->nullable();
            $table->integer('role_fee_max')->nullable();
            $table->string('description')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('proles');
    }
}
