<?php

declare(strict_types=1);

namespace App\Controller\Usuario;

use App\Service\Usuario\UsuarioService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use InvalidArgumentException;
use Throwable;

/**
 * class UsuarioController
 * 
 * @author <davi-alano/>
 */
class UsuarioController
{
    public function __construct(
        private RequestInterface $request,
        private ResponseInterface $response,
        private UsuarioService $service,
    ) {}

    public function createUser()
    {
        try {
            $params = [
                'nome' => $this->request->input('nome'),
                'cpf' => $this->request->input('cpf') ?? '',
                'cnpj' => $this->request->input('cnpj') ?? '',
                'email' => $this->request->input('email'),
                'senha' => $this->request->input('senha'),
                'tipoUsuario' => $this->request->input('tipoUsuario')
            ];

            return $this->response->json([$this->service->create($params)])->withStatus(201);
        } catch (InvalidArgumentException $iae) {
            return $this->response->json([
                'errors' => $iae->getMessage()
            ])->withStatus(422);
        } catch (Throwable $th) {
            return $this->response->json([
                'errors' => $th->getMessage()
            ])->withStatus(500);
        }
    }
}
