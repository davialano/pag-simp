<?php

declare(strict_types=1);

namespace App\Repository\Usuario;

use App\Domain\Usuario\Usuario;

/**
 * interface UsuarioRepositoryInterface
 * 
 * @author <davi-alano/>
 */
interface UsuarioRepositoryInterface
{
    public function save(Usuario $usuario): Usuario;
}
