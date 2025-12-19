<?php

declare(strict_types=1);

namespace App\Repository\Transacao\Transferir;

use App\Domain\Transacao\Transacao;

interface TransferirTransacaoRepositoryInterface
{
    public function save(Transacao $transacao): int;
}
