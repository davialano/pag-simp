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

/**
 * class CriarUsuarioService
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
