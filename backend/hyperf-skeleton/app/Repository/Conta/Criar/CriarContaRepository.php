<?php

declare(strict_types=1);

namespace App\Repository\Conta\Criar;

use App\Domain\Conta\Conta;
use Hyperf\DbConnection\Db;

/**
 * class CriarContaRepository
 * 
 * @author <davi-alano/>
 */
class CriarContaRepository implements CriarContaRepositoryInterface
{
    public function save(Conta $conta): array
    {
        $contaId = Db::table('contas')->insertGetId([
            'numero' => $conta->numero(),
            'usuario_id' => $conta->usuarioId(),
            'saldo' => $conta->saldo(),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return [
            'id' => $contaId,
            'numero' => $conta->numero(),
            'usuarioId' => $conta->usuarioId(),
            'saldo' => $conta->saldo()
        ];
    }
}
