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

namespace App\Controller\Usuario;

use App\Service\Usuario\CriarUsuarioService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use InvalidArgumentException;
use Throwable;

/**
 * class CriarUsuarioController.
 */
class CriarUsuarioController
{
    /**
     * Method constructor.
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param CriarUsuarioService $service
     * 
     * @return void
     */
    public function __construct(
        private RequestInterface $request,
        private ResponseInterface $response,
        private CriarUsuarioService $service,
    ) {}

    /**
     * Method to create user.
     */
    public function createUser()
    {
        try {
            $params = [
                'nome' => $this->request->input('nome'),
                'cpf' => $this->request->input('cpf') ?? '',
                'cnpj' => $this->request->input('cnpj') ?? '',
                'email' => $this->request->input('email'),
                'senha' => $this->request->input('senha'),
                'tipoUsuario' => $this->request->input('tipoUsuario'),
            ];

            return $this->response->json($this->service->create($params))->withStatus(201);
        } catch (InvalidArgumentException $iae) {
            return $this->response->json([
                'errors' => $iae->getMessage(),
            ])->withStatus(422);
        } catch (Throwable $th) {
            return $this->response->json([
                'errors' => $th->getMessage(),
            ])->withStatus(500);
        }
    }
}
