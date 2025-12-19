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

namespace App\Domain\Log;

class Log
{
    public function __construct(
        private ?int $transacaoId,
        private string $status,
        private string $mensagem
    ) {
    }

    public function transacaoId(): ?int
    {
        return $this->transacaoId;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function mensagem(): string
    {
        return $this->mensagem;
    }
}
