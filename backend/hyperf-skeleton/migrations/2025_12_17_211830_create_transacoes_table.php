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
        Schema::create('transacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor');
            $table->unsignedInteger('pagador_id');
            $table->unsignedInteger('beneficiario_id');
            $table->enum('tipo_transacao', ['T', 'D'])->comment('T = Transferência, D = Depósito');
            $table->string('aux_1', 100)->nullable();
            $table->string('aux_2', 100)->nullable();
            $table->timestamps();

            $table->foreign('pagador_id')->references('id')->on('contas')->onDelete('restrict');
            $table->foreign('beneficiario_id')->references('id')->on('contas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
