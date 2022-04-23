<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->integer('basket_id');
        });

        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->integer('direction_code');
            $table->integer('direction_second_code');
            $table->string('direction_title');
        });

        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('profile_title');
            $table->integer('direction_code');
            $table->string('profile_abbreviation');

        });

        Schema::create('basket', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('direction_code');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('directions');
//        Schema::dropIfExists('user');
//        Schema::dropIfExists('profile');
//        Schema::dropIfExists('basket');
    }
};
