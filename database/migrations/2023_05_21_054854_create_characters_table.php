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
        Schema::create('characters', function (Blueprint $table) {
            $table->integer('id')->unique('characters_id_uindex');
            $table->string('name', 100)->index();
            $table->string('status', 100);
            $table->string('species', 100);
            $table->string('type', 100);
            $table->string('gender', 100);
            $table->string('origin_name', 100);
            $table->string('origin_url', 100);
            $table->string('location_name', 100);
            $table->string('location_url', 100);
            $table->string('image', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['gender', 'id'], 'characters_gender_id_uindex');
            $table->unique(['species', 'id'], 'characters_species_id_uindex');
            $table->unique(['status', 'id'], 'characters_status_id_uindex');
            $table->unique(['type', 'id'], 'characters_type_id_uindex');
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
        Schema::dropIfExists('characters');
    }
};
