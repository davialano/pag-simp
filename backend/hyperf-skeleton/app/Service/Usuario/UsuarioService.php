<?php

declare(strict_types=1);

namespace App\Service\Usuario;

use App\Domain\Usuario\UsuarioFactory;
use App\Repository\Usuario\UsuarioRepositoryInterface;

/**
 * class UsuarioService
 * 
 * @author <davi-alano/>
 */
final class UsuarioService
{
    public function __construct(
        private UsuarioRepositoryInterface $repository
    ) {}

    /**
     * Method to create user.
     * 
     * @param array $params
     * 
     * @return Usuario 
     */
    public function create(array $params)
    {
        $usuario = UsuarioFactory::create($params);

        return $this->repository->save($usuario);
    }
}
