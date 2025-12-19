<?php

declare(strict_types=1);

namespace App\Domain\Autorizador;

interface AutorizadorInterface
{
    public function autorizar(): bool;
}
