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

namespace App\Domain\Transacao;

/**
 * class Transacao.
 */
final class Transacao
{
    /**
     * Method constructor.
     */
    public function __construct(
        private float $valor,
        private int $pagador,
        private ?int $beneficiario,
        private string $tipo
    ) {
    }

    /**
     * Getter valor.
     */
    public function valor(): float
    {
        return $this->valor;
    }

    /**
     * Getter pagador.
     */
    public function pagador(): int
    {
        return $this->pagador;
    }

    /**
     * Getter beneficiario.
     */
    public function beneficiario(): ?int
    {
        return $this->beneficiario;
    }

    /**
     * Getter tipo.
     */
    public function tipo(): string
    {
        return $this->tipo;
    }
}
