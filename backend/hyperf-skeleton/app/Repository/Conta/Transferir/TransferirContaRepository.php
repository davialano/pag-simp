<?php

declare(strict_types=1);

namespace App\Repository\Conta\Transferir;

use App\Domain\Conta\Conta;
use App\Domain\Usuario\UsuarioFactory;
use Hyperf\DbConnection\Db;

class TransferirContaRepository implements TransferirContaRepositoryInterface
{
    public function search(int $pagadorId): Conta
    {
        $contaData = Db::table('contas')->where('id', $pagadorId)->first();
        $usuarioData = Db::table('usuarios')->where('id', $contaData->usuario_id)->first();

        $usuario = UsuarioFactory::create(get_object_vars($usuarioData));

        return new Conta(
            numero: $contaData->numero,
            usuarioId: $contaData->usuario_id,
            usuario: $usuario,
            saldo: (float) $contaData->saldo
        );
    }

    public function save(Conta $conta, int $accountId): array
    {
        Db::table('contas')->where('id', $accountId)
            ->update([
                'saldo' => $conta->saldo(),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return [
            'saldo' => $conta->saldo()
        ];
    }
}
