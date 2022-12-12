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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('password');
            $table->integer('rl');
            $table->rememberToken();
            $table->timestamps();
            $table->string('career')->nullable();
            $table->enum('pet',['cat','dog','bird','other','none'])->nullable();
            $table->enum('guests',['often','sometimes','never'])->nullable();
            // 1 = yes ; 0 = no
            $table->integer('shareBelongings')->nullable();
            // 1 = yes ; 0 = no
            $table->integer('smoker')->nullable();
            $table->string('passion')->nullable();

        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
