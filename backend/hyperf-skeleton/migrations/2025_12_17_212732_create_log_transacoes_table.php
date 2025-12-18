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
        Schema::create('log_transacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transacao_id');
            $table->enum('status', ['S', 'E'])->comment('S = Sucesso, E = Erro');
            $table->string('mensagem', 255);
            $table->string('aux_1', 100);
            $table->string('aux_2', 100);
            $table->timestamps();

            $table->foreign('transacao_id')->references('id')->on('transacoes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_transacoes');
    }
};
