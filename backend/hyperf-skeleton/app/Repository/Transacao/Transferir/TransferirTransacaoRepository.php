<?php

declare(strict_types=1);

namespace App\Repository\Transacao\Transferir;

use App\Domain\Transacao\Transacao;
use Hyperf\DbConnection\Db;

class TransferirTransacaoRepository implements TransferirTransacaoRepositoryInterface
{
    public function save(Transacao $transacao): int
    {
        return Db::table('transacoes')->insertGetId([
            'valor' => $transacao->valor(),
            'pagador_id' => $transacao->pagador(),
            'beneficiario_id' => $transacao->beneficiario(),
            'tipo_transacao' => $transacao->tipo(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
