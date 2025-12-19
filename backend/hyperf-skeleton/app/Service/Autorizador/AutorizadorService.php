<?php

declare(strict_types=1);

namespace App\Service\Autorizador;

use App\Domain\Autorizador\AutorizadorInterface;
use Hyperf\Guzzle\ClientFactory;

final class AutorizadorService implements AutorizadorInterface
{
    private $client;

    public function __construct(ClientFactory $clientFactory)
    {
        $this->client = $clientFactory->create();
    }

    public function autorizar(): bool
    {
        $response = $this->client->request('GET', 'https://util.devi.tools/api/v2/authorize');

        $data = json_decode((string) $response->getBody(), true);

        return isset($data['data']['authorization'])
            && $data['data']['authorization'] === true;
    }
}
