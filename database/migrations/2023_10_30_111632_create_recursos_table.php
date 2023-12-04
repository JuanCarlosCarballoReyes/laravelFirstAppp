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
        // id (pk), title (unique), director, year, genre (null)
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60) -> unique;
            $table->string('director', 110);
            $table->integer('year');
            $table->string('genre', 50) -> nullable;                      
            $table->timestamps(); // marca de tiempo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie');
    }
};
