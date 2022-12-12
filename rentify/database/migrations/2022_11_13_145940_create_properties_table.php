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
            $table->bigIncrements('id');
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
            $table->string('image');
            $table->enum('status',['pending','validated','rejected'])->default('pending');
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
        Schema::dropIfExists('properties');
    }
};
