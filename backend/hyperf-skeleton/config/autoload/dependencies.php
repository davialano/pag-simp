<?php

declare(strict_types=1);

use App\Domain\Autorizador\AutorizadorInterface;
use App\Domain\Notificacao\NotificacaoInterface;
use App\Repository\Conta\Criar\CriarContaRepository;
use App\Repository\Conta\Criar\CriarContaRepositoryInterface;
use App\Repository\Conta\Depositar\DepositarContaRepository;
use App\Repository\Conta\Depositar\DepositarContaRepositoryInterface;
use App\Repository\Conta\Transferir\TransferirContaRepository;
use App\Repository\Conta\Transferir\TransferirContaRepositoryInterface;
use App\Repository\Log\LogTransacaoRepository;
use App\Repository\Log\LogTransacaoRepositoryInterface;
use App\Repository\Transacao\Depositar\DepositarTransacaoRepository;
use App\Repository\Transacao\Depositar\DepositarTransacaoRepositoryInterface;
use App\Repository\Transacao\Transferir\TransferirTransacaoRepository;
use App\Repository\Transacao\Transferir\TransferirTransacaoRepositoryInterface;
use App\Repository\Usuario\CriarUsuarioRepository;
use App\Repository\Usuario\CriarUsuarioRepositoryInterface;
use App\Service\Autorizador\AutorizadorService;
use App\Service\Notificacao\NotificacaoService;

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    CriarUsuarioRepositoryInterface::class => CriarUsuarioRepository::class,

    CriarContaRepositoryInterface::class => CriarContaRepository::class,

    DepositarContaRepositoryInterface::class => DepositarContaRepository::class,

    DepositarTransacaoRepositoryInterface::class => DepositarTransacaoRepository::class,

    LogTransacaoRepositoryInterface::class => LogTransacaoRepository::class,

    TransferirContaRepositoryInterface::class => TransferirContaRepository::class,

    TransferirTransacaoRepositoryInterface::class => TransferirTransacaoRepository::class,

    AutorizadorInterface::class => AutorizadorService::class,

    NotificacaoInterface::class => NotificacaoService::class
];
