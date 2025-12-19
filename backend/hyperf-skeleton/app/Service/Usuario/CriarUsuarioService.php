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

namespace App\Service\Usuario;

use App\Domain\Usuario\UsuarioFactory;
use App\Repository\Usuario\CriarUsuarioRepositoryInterface;
use DomainException;

/**
 * class CriarUsuarioService.
 */
final class CriarUsuarioService
{
    /**
     * Method constructor.
     */
    public function __construct(
        private CriarUsuarioRepositoryInterface $repository
    ) {
    }

    /**
     * Method to create user.
     */
    public function create(array $params): array
    {
        if (empty($params['cpf']) && empty($params['cnpj'])) {
            throw new DomainException('Documento não informado');
        }

        if ($this->repository->searchByDocument($params['cpf'], $params['cnpj'])) {
            throw new DomainException('Documento informado já existe');
        }

        if ($this->repository->searchByEmail($params['email'])) {
            throw new DomainException('Email já existe');
        }

        $usuario = UsuarioFactory::create($params);

        return $this->repository->save($usuario);
    }
}
