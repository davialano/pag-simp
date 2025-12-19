<?php

declare(strict_types=1);

namespace App\Repository\Conta\Depositar;

use App\Domain\Conta\Conta;

interface DepositarContaRepositoryInterface
{
    public function search(int $accountId): Conta;

    public function save(Conta $conta, int $accountId): array;
}
