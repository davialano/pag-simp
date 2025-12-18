<?php

declare(strict_types=1);

namespace App\Repository\Usuario;

use App\Domain\Usuario\Usuario;
use Hyperf\DbConnection\Db;

/**
 * class UsuarioRepository
 * 
 * @author <davi-alano/>
 */
class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function save(Usuario $usuario): Usuario
    {
        Db::table('usuarios')->insert([
            'nome' => $usuario->nome(),
            'cpf' => $usuario->cpf(),
            'cnpj' => $usuario->cnpj(),
            'email' => $usuario->email(),
            'tipo_usuario' => $usuario->tipo(),
            'senha' => password_hash($usuario->senha(), PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return $usuario;
    }
}
