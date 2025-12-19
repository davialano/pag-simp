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

namespace App\Controller\Conta\Criar;

use App\Service\Conta\Criar\CriarContaService;
use DomainException;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

/**
 * class CriarContaController.
 */
class CriarContaController
{
    /**
     * Method constructor.
     */
    public function __construct(
        private RequestInterface $request,
        private ResponseInterface $response,
        private CriarContaService $service
    ) {
    }

    /**
     * Method to create account.
     */
    public function createAccount()
    {
        try {
            $usuarioId = (int) $this->request->route('usuarioId');

            return $this->response->json($this->service->create($usuarioId))->withStatus(201);
        } catch (DomainException $de) {
            return $this->response->json([
                'errors' => $de->getMessage(),
            ])->withStatus(406);
        } catch (Throwable $th) {
            return $this->response->json([
                'errors' => $th->getMessage(),
            ])->withStatus(500);
        }
    }
}
