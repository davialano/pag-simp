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

namespace App\Controller\Conta\Depositar;

use App\Service\Conta\Depositar\DepositarContaService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

/**
 * class DepositarContaController.
 */
class DepositarContaController
{
    /**
     * Method constructor.
     */
    public function __construct(
        private RequestInterface $request,
        private ResponseInterface $response,
        private DepositarContaService $service
    ) {
    }

    /**
     * Method to deposit in account.
     */
    public function depositAccount()
    {
        try {
            $params = [
                'accountId' => (int) $this->request->route('accountId'),
                'valor' => $this->request->input('valor'),
            ];

            return $this->response->json($this->service->deposit($params))->withStatus(201);
        } catch (Throwable $th) {
            return $this->response->json([
                'errors' => $th->getMessage(),
            ])->withStatus(500);
        }
    }
}
