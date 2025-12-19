<?php

declare(strict_types=1);

namespace App\Controller\Conta\Criar;

use App\Service\Conta\Criar\CriarContaService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

/**
 * class CriarContaController
 * 
 * @author <davi-alano/>
 */
class CriarContaController
{
    public function __construct(
        private RequestInterface $request,
        private ResponseInterface $response,
        private CriarContaService $service
    ) {}

    public function createAccount()
    {
        try {
            $usuarioId = (int) $this->request->route('usuarioId');

            return $this->response->json($this->service->create($usuarioId))->withStatus(201);
        } catch (Throwable $th) {
            return $this->response->json([
                'errors' => $th->getMessage()
            ])->withStatus(500);
        }
    }
}
