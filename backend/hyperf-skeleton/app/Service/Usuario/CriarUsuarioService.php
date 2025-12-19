<?php

declare(strict_types=1);

namespace App\Service\Usuario;

use App\Domain\Usuario\UsuarioFactory;
use App\Repository\Usuario\CriarUsuarioRepositoryInterface;

/**
 * class CriarUsuarioService
 * 
 * @author <davi-alano/>
 */
final class CriarUsuarioService
{
    /**
     * Method constructor.
     * 
     * @param CriarUsuarioRepositoryInterface $repository
     * 
     * @return void
     */
    public function __construct(
        private CriarUsuarioRepositoryInterface $repository
    ) {}

    /**
     * Method to create user.
     * 
     * @param array $params
     * 
     * @return array 
     */
    public function create(array $params): array
    {
        $usuario = UsuarioFactory::create($params);

        return $this->repository->save($usuario);
    }
}
