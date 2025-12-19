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

/**
 * class Log
 */
final class Log
{
    /**
     * Method constructor.
     * 
     * @param ?int $transacaoId
     * @param string $status
     * @param string $mensagem
     * 
     * @return void
     */
    public function __construct(
        private ?int $transacaoId,
        private string $status,
        private string $mensagem
    ) {}

    /**
     * Getter transacaoId.
     * 
     * @return ?int
     */
    public function transacaoId(): ?int
    {
        return $this->transacaoId;
    }

    /**
     * Getter status.
     * 
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * Getter mensagem.
     * 
     * @return string
     */
    public function mensagem(): string
    {
        return $this->mensagem;
    }
}
