<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Repository\Transacao\Transferir;

use App\Domain\Transacao\Transacao;
use Hyperf\DbConnection\Db;

/**
 * class TransferirTransacaoRepository
 */
class TransferirTransacaoRepository implements TransferirTransacaoRepositoryInterface
{
    /**
     * Method to save transfer transaction.
     * 
     * @param Transacao $transacao
     * 
     * @return int
     */
    public function save(Transacao $transacao): int
    {
        return Db::table('transacoes')->insertGetId([
            'valor' => $transacao->valor(),
            'pagador_id' => $transacao->pagador(),
            'beneficiario_id' => $transacao->beneficiario(),
            'tipo_transacao' => $transacao->tipo(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
