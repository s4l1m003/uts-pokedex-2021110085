<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // database/migrations/xxxx_xx_xx_create_pokemons_table.php
public function up()
{
    Schema::create('pokemons', function (Blueprint $table) {
        $table->id();
        $table->string('name', 255)->nullable(false);
        $table->string('species', 100)->nullable(false);
        $table->string('primary_type', 50)->nullable(false);
        $table->decimal('weight', 8, 2)->default(0);
        $table->decimal('height', 8, 2)->default(0);
        $table->integer('hp')->default(0)->unsigned();
        $table->integer('attack')->default(0)->unsigned();
        $table->integer('defense')->default(0)->unsigned();
        $table->boolean('is_legendary')->default(false);
        $table->string('photo')->nullable();
        $table->timestamps();
    });
}

