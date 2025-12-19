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

namespace App\Service\Conta\Criar;

use App\Domain\Conta\Conta;
use App\Repository\Conta\Criar\CriarContaRepositoryInterface;

/**
 * class CriarContaService.
 */
final class CriarContaService
{
    /**
     * Method constructor.
     */
    public function __construct(
        private CriarContaRepositoryInterface $repository
    ) {
    }

    /**
     * Method to create account.
     */
    public function create(int $usuarioId): array
    {
        $conta = new Conta(
            numero: $this->genAccountNumber(),
            usuarioId: $usuarioId,
            usuario: null,
            saldo: 0
        );

        return $this->repository->save($conta);
    }

    /**
     * Method to generate account number.
     */
    private function genAccountNumber(): int
    {
        return random_int(0000, 9999);
    }
}
