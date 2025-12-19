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

namespace App\Repository\Usuario;

use App\Domain\Usuario\Usuario;

/**
 * interface CriarUsuarioRepositoryInterface.
 */
interface CriarUsuarioRepositoryInterface
{
    /**
     * Method to save user.
     */
    public function save(Usuario $usuario): array;
}
