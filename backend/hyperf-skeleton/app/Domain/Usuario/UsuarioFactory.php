<?php

declare(strict_types=1);

namespace App\Domain\Usuario;

use App\Enum\TipoUsuario;
use InvalidArgumentException;

/**
 * class UsuarioFactory
 * 
 * @author <davi-alano/>
 */
final class UsuarioFactory
{
    public static function create(array $params): Usuario
    {
        if (! isset($params['tipoUsuario'])) {
            throw new InvalidArgumentException('Tipo de usuário é obrigatório');
        }

        return match (TipoUsuario::from($params['tipoUsuario'])) {
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
