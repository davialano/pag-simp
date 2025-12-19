<?php

declare(strict_types=1);

namespace App\Domain\Conta;

use App\Domain\Usuario\Usuario;
use DomainException;
use InvalidArgumentException;

/**
 * class Conta
 * 
 * @author <davi-alano/>
 */
final class Conta
{
    public function __construct(
        private int $numero,
        private int $usuarioId,
        private ?Usuario $usuario,
        private float $saldo
    ) {}

    public function numero(): int
    {
        return $this->numero;
    }

    public function usuarioId(): int
    {
        return $this->usuarioId;
    }

    public function saldo(): float
    {
        return $this->saldo;
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('Valor inválido');
        }

        $this->saldo += $valor;
    }

    public function podeEfetuarDeposito(): void
    {
        if ($this->usuario->isLojista()) {
            throw new DomainException('Lojistas não podem efetuar depósitos');
        }
    }

    public function podeEfetuarTransferencia(): void
    {
        if ($this->usuario->isLojista()) {
            throw new DomainException('Lojistas não podem efetuar transferências');
        }
    }

    public function transferir(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('Valor inválido');
        }

        if ($this->saldo < $valor) {
            throw new DomainException('O saldo é insuficiente para completar a transação');
        }

        $this->saldo -= $valor;
    }
}
