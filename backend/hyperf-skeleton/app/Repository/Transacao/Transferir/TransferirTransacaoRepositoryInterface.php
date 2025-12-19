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

/**
 * interface TransferirTransacaoRepositoryInterface
 */
interface TransferirTransacaoRepositoryInterface
{
    /**
     * Method to save transfer transaction.
     * 
     * @param Transacao $transacao
     * 
     * @return int
     */
    public function save(Transacao $transacao): int;
}
