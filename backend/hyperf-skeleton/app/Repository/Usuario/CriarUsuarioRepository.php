<?php

declare(strict_types=1);

namespace App\Repository\Usuario;

use App\Domain\Usuario\Usuario;
use Hyperf\DbConnection\Db;

/**
 * class CriarUsuarioRepository
 * 
 * @author <davi-alano/>
 */
class CriarUsuarioRepository implements CriarUsuarioRepositoryInterface
{
    /**
     * Method to persist user information.
     * 
     * @param Usuario $usuario
     * 
     * @return array
     */
    public function save(Usuario $usuario): array
    {
        $usuarioId = Db::table('usuarios')->insertGetId([
            'nome' => $usuario->nome(),
            'cpf' => $usuario->cpf(),
            'cnpj' => $usuario->cnpj(),
            'email' => $usuario->email(),
            'tipo_usuario' => $usuario->tipo(),
            'senha' => password_hash($usuario->senha(), PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return [
            'id' => $usuarioId,
            'nome' => $usuario->nome(),
            'email' => $usuario->email(),
            'tipoUsuario' => $usuario->tipo()
        ];
    }
}
