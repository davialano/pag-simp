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

namespace App\Controller\Conta\Transferir;

use App\Service\Conta\Transferir\TransferirContaService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

/**
 * class TransferirContaController
 */
class TransferirContaController
{
    /**
     * Method constructor.
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param TransferirContaService $service
     * 
     * @return void
     */
    public function __construct(
        private RequestInterface $request,
        private ResponseInterface $response,
        private TransferirContaService $service
    ) {}

    /**
     * Method to transfer in account.
     */
    public function transferAccount()
    {
        try {
            $params = [
                'pagadorId' => (int) $this->request->route('pagadorId'),
                'beneficiarioId' => $this->request->input('beneficiarioId'),
                'valor' => (float) $this->request->input('valor'),
            ];

            return $this->response->json($this->service->transfer($params))->withStatus(201);
        } catch (Throwable $th) {
            return $this->response->json([
                'errors' => $th->getMessage(),
            ])->withStatus(500);
        }
    }
}
