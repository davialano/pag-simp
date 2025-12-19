<?php

declare(strict_types=1);

namespace App\Repository\Log;

use App\Domain\Log\Log;

interface LogTransacaoRepositoryInterface
{
    public function sucesso(Log $log): void;

    public function falha(Log $log): void;
}
