<?php

declare(strict_types=1);

namespace App\Repository\Usuario;

use App\Domain\Usuario\Usuario;

/**
 * interface CriarUsuarioRepositoryInterface
 * 
 * @author <davi-alano/>
 */
interface CriarUsuarioRepositoryInterface
{
    /**
     * Method to persist user information.
     * 
     * @param Usuario $usuario
     * 
     * @return array
     */
    public function save(Usuario $usuario): array;
}
