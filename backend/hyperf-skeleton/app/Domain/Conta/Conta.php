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

namespace App\Domain\Conta;

use App\Domain\Usuario\Usuario;
use DomainException;
use InvalidArgumentException;

/**
 * class Conta.
 */
final class Conta
{
    /**
     * Method constructor.
     * 
     * @param int $numero
     * @param int $usuarioId
     * @param ?Usuario $usuario
     * @param float $saldo
     * 
     * @return void
     */
    public function __construct(
        private int $numero,
        private int $usuarioId,
        private ?Usuario $usuario,
        private float $saldo
    ) {}

    /**
     * Getter numero.
     * 
     * @return int
     */
    public function numero(): int
    {
        return $this->numero;
    }

    /**
     * Getter usuarioId.
     * 
     * @return int
     */
    public function usuarioId(): int
    {
        return $this->usuarioId;
    }

    /**
     * Getter saldo.
     * 
     * @return float
     */
    public function saldo(): float
    {
        return $this->saldo;
    }

    /**
     * Method to deposit in account.
     * 
     * @param float $valor
     * 
     * @return void
     */
    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('Valor inválido');
        }

        $this->saldo += $valor;
    }

    /**
     * Method to check elegibility.
     * 
     * @return void
     */
    public function podeEfetuarDeposito(): void
    {
        if ($this->usuario->isLojista()) {
            throw new DomainException('Lojistas não podem efetuar depósitos');
        }
    }

    /**
     * Method to check elegibility.
     * 
     * @return void
     */
    public function podeEfetuarTransferencia(): void
    {
        if ($this->usuario->isLojista()) {
            throw new DomainException('Lojistas não podem efetuar transferências');
        }
    }

    /**
     * Method to transfer in account.
     * 
     * @param float $valor
     * 
     * @return void
     */
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
