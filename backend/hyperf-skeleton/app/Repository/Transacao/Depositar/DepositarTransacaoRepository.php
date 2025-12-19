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

namespace App\Repository\Transacao\Depositar;

use App\Domain\Transacao\Transacao;
use Hyperf\DbConnection\Db;

/**
 * class DepositarTransacaoRepository.
 */
class DepositarTransacaoRepository implements DepositarTransacaoRepositoryInterface
{
    /**
     * Method to save deposit transaction.
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
