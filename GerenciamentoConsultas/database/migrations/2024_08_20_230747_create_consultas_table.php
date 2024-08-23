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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('especialidade');        
            $table->time('horario')->nullable(); // Tipo time
            $table->date('data_consulta'); // Campo para data da consulta
            $table->enum('status', ['agendado', 'cancelado', 'concluido', 'pendente'])->default('agendado');
            $table->boolean('disponivel')->default(true); // Campo para disponibilidade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
