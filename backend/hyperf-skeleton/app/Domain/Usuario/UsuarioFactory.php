<?php

declare(strict_types=1);

namespace App\Domain\Usuario;

use App\Enum\TipoUsuario;
use InvalidArgumentException;
use Symfony\Component\Console\Helper\Dumper;

/**
 * class UsuarioFactory
 * 
 * @author <davi-alano/>
 */
final class UsuarioFactory
{
    /**
     * Method to create user object.
     * 
     * @param array $params
     * 
     * @return Usuario
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
