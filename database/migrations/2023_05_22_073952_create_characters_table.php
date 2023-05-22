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
            $table->string('status', 100)->nullable();
            $table->string('species', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('origin_name', 100)->nullable();
            $table->string('origin_url', 100)->nullable();
            $table->string('location_name', 100)->nullable();
            $table->string('location_url', 100)->nullable();
            $table->string('image', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

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
