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
 * class Transacao
 */
final class Transacao
{
    /**
     * Method constructor.
     * 
     * @param float $valor
     * @param int $pagador
     * @param ?int $beneficiario
     * @param string $tipo
     * 
     * @return void
     */
    public function __construct(
        private float $valor,
        private int $pagador,
        private ?int $beneficiario,
        private string $tipo
    ) {}

    /**
     * Getter valor.
     * 
     * @return float
     */
    public function valor(): float
    {
        return $this->valor;
    }

    /**
     * Getter pagador.
     * 
     * @return int
     */
    public function pagador(): int
    {
        return $this->pagador;
    }

    /**
     * Getter beneficiario.
     * 
     * @return ?int
     */
    public function beneficiario(): ?int
    {
        return $this->beneficiario;
    }

    /**
     * Getter tipo.
     * 
     * @return string
     */
    public function tipo(): string
    {
        return $this->tipo;
    }
}
