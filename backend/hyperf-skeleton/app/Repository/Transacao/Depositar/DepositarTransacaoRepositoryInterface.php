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

interface DepositarTransacaoRepositoryInterface
{
    public function save(Transacao $transacao): int;
}
