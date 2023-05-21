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
        Schema::create('episodes', function (Blueprint $table) {
            $table->integer('id')->unique('episodes_id_uindex');
            $table->integer('serie_id');
            $table->string('name', 100);
            $table->date('air_date');
            $table->string('episode', 10);
            $table->timestamp('created_at')->nullable();
            $table->softDeletes();
            $table->timestamp('updated_at')->nullable();

            $table->unique(['air_date', 'id'], 'episodes_air_date_id_uindex');
            $table->unique(['name', 'id'], 'episodes_name_id_uindex');
            $table->unique(['serie_id', 'episode'], 'episodes_serie_id_episode_uindex');
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
        Schema::dropIfExists('episodes');
    }
};
