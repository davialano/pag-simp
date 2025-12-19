<?php

declare(strict_types=1);

namespace App\Repository\Log;

use App\Domain\Log\Log;
use Hyperf\DbConnection\Db;

class LogTransacaoRepository implements LogTransacaoRepositoryInterface
{
    public function sucesso(Log $log): void
    {
        Db::table('log_transacoes')->insert([
            'transacao_id' => $log->transacaoId(),
            'status' => $log->status(),
            'mensagem' => $log->mensagem(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function falha(Log $log): void
    {
        Db::table('log_transacoes')->insert([
            'transacao_id' => $log->transacaoId(),
            'status' => $log->status(),
            'mensagem' => $log->mensagem(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
