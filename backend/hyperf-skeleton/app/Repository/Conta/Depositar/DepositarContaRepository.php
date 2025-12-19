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

namespace App\Repository\Conta\Depositar;

use App\Domain\Conta\Conta;
use App\Domain\Usuario\UsuarioFactory;
use Hyperf\DbConnection\Db;

/**
 * class DepositarContaRepository
 */
class DepositarContaRepository implements DepositarContaRepositoryInterface
{
    /**
     * Method to search for account.
     * 
     * @param int $accountId
     * 
     * @return Conta
     */
    public function search(int $accountId): Conta
    {
        $contaData = Db::table('contas')->where('id', $accountId)->first();
        $usuarioData = Db::table('usuarios')->where('id', $contaData->usuario_id)->first();

        $usuario = UsuarioFactory::create(get_object_vars($usuarioData));

        return new Conta(
            numero: $contaData->numero,
            usuarioId: $contaData->usuario_id,
            usuario: $usuario,
            saldo: (float) $contaData->saldo
        );
    }

    /**
     * Method to save deposit.
     * 
     * @param Conta $conta
     * @param int $accountId
     * 
     * @return array
     */
    public function save(Conta $conta, int $accountId): array
    {
        Db::table('contas')->where('id', $accountId)
            ->update([
                'saldo' => $conta->saldo(),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return [
            'saldo' => $conta->saldo(),
        ];
    }
}
