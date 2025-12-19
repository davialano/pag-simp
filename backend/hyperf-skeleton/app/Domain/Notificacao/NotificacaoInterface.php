<?php

declare(strict_types=1);

namespace App\Domain\Notificacao;

interface NotificacaoInterface
{
    public function notificar(): bool;
}
