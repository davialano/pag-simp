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

namespace App\Service\Conta\Transferir;

use App\Domain\Autorizador\AutorizadorInterface;
use App\Domain\Log\Log;
use App\Domain\Notificacao\NotificacaoInterface;
use App\Domain\Transacao\Transacao;
use App\Repository\Conta\Transferir\TransferirContaRepositoryInterface;
use App\Repository\Log\LogTransacaoRepositoryInterface;
use App\Repository\Transacao\Transferir\TransferirTransacaoRepositoryInterface;
use DomainException;
use Hyperf\DbConnection\Db;
use Throwable;

/**
 * class TransferirContaService.
 */
final class TransferirContaService
{
    /**
     * Method constructor.
     */
    public function __construct(
        private TransferirContaRepositoryInterface $repositoryConta,
        private TransferirTransacaoRepositoryInterface $repositoryTransacao,
        private LogTransacaoRepositoryInterface $repositoryLog,
        private AutorizadorInterface $autorizador,
        private NotificacaoInterface $notificacao
    ) {}

    /**
     * Method to transfer in account.
     */
    public function transfer(array $params): array
    {
        $transacaoId = null;

        try {
            // if (! $this->autorizador->autorizar()) {
            //     throw new DomainException('Transferência não autorizada');
            // }

            if ($params['pagadorId'] === $params['beneficiarioId']) {
                throw new DomainException('Não é possível transferir para sua própria conta');
            }

            $transacaoId = Db::transaction(function () use ($params) {
                $pagador = $this->repositoryConta->search($params['pagadorId']);
                $beneficiario = $this->repositoryConta->search($params['beneficiarioId']);

                $pagador->podeEfetuarTransferencia($params['valor']);
                $pagador->transferir($params['valor']);
                $beneficiario->depositar($params['valor']);

                $this->repositoryConta->save($pagador, $params['pagadorId']);
                $this->repositoryConta->save($beneficiario, $params['beneficiarioId']);

                $transacao = new Transacao(
                    valor: $params['valor'],
                    pagador: $params['pagadorId'],
                    beneficiario: $params['beneficiarioId'],
                    tipo: 'T'
                );

                return $this->repositoryTransacao->save($transacao);
            });

            $this->repositoryLog->sucesso(
                new Log(
                    transacaoId: $transacaoId,
                    status: 'S',
                    mensagem: 'pagador_id ' . $params['pagadorId'] . ', beneficiario_id ' . $params['beneficiarioId'] . ', valor ' . $params['valor']
                )
            );

            // if (! $this->notificacao->notificar()) {
            //     throw new DomainException('Transferência não notificada');
            // }

            return [
                'valor_transferido' => $params['valor'],
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
