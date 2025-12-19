<?php

declare(strict_types=1);

namespace App\Repository\Transacao\Depositar;

use App\Domain\Transacao\Transacao;

interface DepositarTransacaoRepositoryInterface
{
    public function save(Transacao $transacao): int;
}
