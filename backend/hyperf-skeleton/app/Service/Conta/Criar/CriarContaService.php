<?php

declare(strict_types=1);

namespace App\Service\Conta\Criar;

use App\Domain\Conta\Conta;
use App\Repository\Conta\Criar\CriarContaRepositoryInterface;

/**
 * class CriarContaService
 * 
 * @author <davi-alano/>
 */
class CriarContaService
{
    public function __construct(
        private CriarContaRepositoryInterface $repository
    ) {}

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

    private function genAccountNumber(): int
    {
        return random_int(0000, 9999);
    }
}
