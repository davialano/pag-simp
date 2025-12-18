<?php

declare(strict_types=1);

use App\Repository\Usuario\UsuarioRepository;
use App\Repository\Usuario\UsuarioRepositoryInterface;

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    UsuarioRepositoryInterface::class => UsuarioRepository::class
];
