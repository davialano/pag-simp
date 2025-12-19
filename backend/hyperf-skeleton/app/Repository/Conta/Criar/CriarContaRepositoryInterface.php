<?php

declare(strict_types=1);

namespace App\Repository\Conta\Criar;

use App\Domain\Conta\Conta;

interface CriarContaRepositoryInterface
{
    public function save(Conta $conta): array;
}
