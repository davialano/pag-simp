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

namespace App\Service\Conta\Depositar;

use App\Domain\Log\Log;
use App\Domain\Transacao\Transacao;
use App\Repository\Conta\Depositar\DepositarContaRepositoryInterface;
use App\Repository\Log\LogTransacaoRepositoryInterface;
use App\Repository\Transacao\Depositar\DepositarTransacaoRepositoryInterface;
use Hyperf\DbConnection\Db;
use Throwable;

/**
 * class DepositarContaService
 */
final class DepositarContaService
{
    /**
     * Method constructor.;
     * 
     * @param DepositarContaRepositoryInterface $repositoryConta
     * @param DepositarTransacaoRepositoryInterface $repositoryTransacao
     * @param LogTransacaoRepositoryInterface $repositoryLog
     * 
     * @return void
     */
    public function __construct(
        private DepositarContaRepositoryInterface $repositoryConta,
        private DepositarTransacaoRepositoryInterface $repositoryTransacao,
        private LogTransacaoRepositoryInterface $repositoryLog,
    ) {}

    /**
     * Method to deposit in account.
     * 
     * @param array $params
     * 
     * @return array
     */
    public function deposit(array $params): array
    {
        $transacaoId = null;

        try {
            $transacaoId = Db::transaction(function () use ($params) {
                $conta = $this->repositoryConta->search($params['accountId']);
                $conta->podeEfetuarDeposito();
                $conta->depositar($params['valor']);

                $transacao = new Transacao(
                    valor: $params['valor'],
                    pagador: $params['accountId'],
                    beneficiario: null,
                    tipo: 'D'
                );

                $this->repositoryConta->save($conta, $params['accountId']);
                return $this->repositoryTransacao->save($transacao);
            });

            $this->repositoryLog->sucesso(
                new Log(
                    transacaoId: $transacaoId,
                    status: 'S',
                    mensagem: 'conta_id ' . $params['accountId'] . ', valor ' . $params['valor']
                )
            );

            return [
                'valor_depositado' => $params['valor'],
            ];
        } catch (Throwable $th) {
            $this->repositoryLog->falha(
                new Log(
                    transacaoId: $transacaoId,
                    status: 'E',
                    mensagem: substr($th->getMessage(), 0, 255)
                )
            );
            throw $th;
        }
    }
}
