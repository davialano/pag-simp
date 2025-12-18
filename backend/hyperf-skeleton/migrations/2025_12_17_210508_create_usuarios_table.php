<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->char('cpf', 11)->unique()->nullable();
            $table->char('cnpj', 14)->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->string('senha', 255);
            $table->enum('tipo_usuario', ['C', 'L'])->comment('C = Comum, L = Lojista');
            $table->string('aux_1', 100)->nullable();
            $table->string('aux_2', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
