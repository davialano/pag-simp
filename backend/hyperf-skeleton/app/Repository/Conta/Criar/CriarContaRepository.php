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

namespace App\Repository\Conta\Criar;

use App\Domain\Conta\Conta;
use Hyperf\DbConnection\Db;

/**
 * class CriarContaRepository.
 */
class CriarContaRepository implements CriarContaRepositoryInterface
{
    /**
     * Method to search by user id.
     */
    public function searchByUserId(int $usuarioId): bool
    {
        $data = Db::table('usuarios')->where('id', $usuarioId)->first();

        return $data ? true : false;
    }

    /**
     * Method to save account.
     */
    public function save(Conta $conta): array
    {
        $contaId = Db::table('contas')->insertGetId([
            'numero' => $conta->numero(),
            'usuario_id' => $conta->usuarioId(),
            'saldo' => $conta->saldo(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return [
            'id' => $contaId,
            'numero' => $conta->numero(),
            'usuarioId' => $conta->usuarioId(),
            'saldo' => $conta->saldo(),
        ];
    }
}
