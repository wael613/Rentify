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
        Schema::create('properties', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->float('monthlyCost');
            $table->longText('description');
            $table->enum('propertyType',['house','flat']);
            $table->enum('furnishType',['furnished','unfurnished']);
            $table->enum('letType',['longTerm','shortTerm']);
            $table->date('availability');
            $table->integer('rooms');
            $table->integer('baths');
            $table->string('options');
            $table->enum('status',['pending','validated','rejected'])->default('pending');
            $table->timestamps();
            $table->string('image');
            $table->foreignId("user_id")->constraint("users")->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
