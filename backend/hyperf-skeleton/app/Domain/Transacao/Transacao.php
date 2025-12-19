<?php

declare(strict_types=1);

namespace App\Domain\Transacao;

final class Transacao
{
    public function __construct(
        private float $valor,
        private int $pagador,
        private ?int $beneficiario,
        private string $tipo
    ) {}

    public function valor(): float
    {
        return $this->valor;
    }

    public function pagador(): int
    {
        return $this->pagador;
    }

    public function beneficiario(): ?int
    {
        return $this->beneficiario;
    }

    public function tipo(): string
    {
        return $this->tipo;
    }
}
