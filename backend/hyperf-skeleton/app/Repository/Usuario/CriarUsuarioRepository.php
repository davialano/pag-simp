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
use Hyperf\DbConnection\Db;

/**
 * class CriarUsuarioRepository.
 */
class CriarUsuarioRepository implements CriarUsuarioRepositoryInterface
{
    /**
     * Method to search by document CPF or CNPJ.
     */
    public function searchByDocument(?string $cpf, ?string $cnpj): bool
    {
        if ($cpf) {
            $data = Db::table('usuarios')->where('cpf', $cpf)->first();

            return $data ? true : false;
        }
        if ($cnpj) {
            $data = Db::table('usuarios')->where('cnpj', $cnpj)->first();

            return $data ? true : false;
        }
        return false;
    }

    /**
     * Method to search by email.
     */
    public function searchByEmail(string $email): bool
    {
        $data = Db::table('usuarios')->where('email', $email)->first();

        return $data ? true : false;
    }

    /**
     * Method to save user.
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
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return [
            'id' => $usuarioId,
            'nome' => $usuario->nome(),
            'email' => $usuario->email(),
            'tipoUsuario' => $usuario->tipo(),
        ];
    }
}
