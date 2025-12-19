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
use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api', function () {
    Router::addGroup('/user', function () {
        Router::post('/create', 'App\Controller\Usuario\CriarUsuarioController@createUser');
    });

    Router::addGroup('/account', function () {
        Router::post('/create/{usuarioId}', 'App\Controller\Conta\Criar\CriarContaController@createAccount');
        Router::post('/deposit/{accountId}', 'App\Controller\Conta\Depositar\DepositarContaController@depositAccount');
        Router::post('/transfer/{pagadorId}', 'App\Controller\Conta\Transferir\TransferirContaController@transferAccount');
    });
});
