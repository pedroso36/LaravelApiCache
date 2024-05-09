<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('documento')->unique();
            $table->integer('idade');
            $table->string('data_de_nascimento');
            $table->string('genero');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('familiar_em_outro_abrigo')->nullable();
            $table->string('nome_do_primeiro_abrigo')->nullable();
            $table->string('observacao')->nullable();
            $table->string('nome_do_voluntario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};
