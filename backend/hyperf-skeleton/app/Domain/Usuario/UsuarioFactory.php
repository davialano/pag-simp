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

namespace App\Domain\Usuario;

use App\Enum\TipoUsuario;
use InvalidArgumentException;

/**
 * class UsuarioFactory.
 */
final class UsuarioFactory
{
    /**
     * Method to create user object.
     */
    public static function create(array $params): Usuario
    {
        $tipoUsuario = $params['tipoUsuario'] ?? $params['tipo_usuario'] ?? null;

        if ($tipoUsuario === null) {
            throw new InvalidArgumentException('Tipo de usuário é obrigatório');
        }

        return match (TipoUsuario::from($tipoUsuario)) {
            TipoUsuario::Comum => new UsuarioComum(
                nome: $params['nome'],
                email: $params['email'],
                cpf: $params['cpf'] ?? '',
                senha: $params['senha']
            ),

            TipoUsuario::Lojista => new UsuarioLojista(
                nome: $params['nome'],
                email: $params['email'],
                cnpj: $params['cnpj'] ?? '',
                senha: $params['senha']
            )
        };
    }
}
