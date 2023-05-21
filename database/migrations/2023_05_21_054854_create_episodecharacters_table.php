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
        Schema::create('episodecharacters', function (Blueprint $table) {
            $table->integer('id', true)->unique('episodecharacters_id_uindex');
            $table->integer('episode_id');
            $table->integer('character_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['character_id', 'episode_id'], 'episodecharacters_character_id_episode_id_uindex');
            $table->unique(['episode_id', 'character_id'], 'episodecharacters_episode_id_character_id_uindex');
            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodecharacters');
    }
};
