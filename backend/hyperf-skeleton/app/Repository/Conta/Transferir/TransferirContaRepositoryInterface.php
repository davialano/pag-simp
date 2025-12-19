<?php

declare(strict_types=1);

namespace App\Repository\Conta\Transferir;

use App\Domain\Conta\Conta;

interface TransferirContaRepositoryInterface
{
    public function search(int $pagadorId): Conta;

    public function save(Conta $conta, int $accountId): array;
}
