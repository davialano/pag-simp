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

namespace App\Service\Notificacao;

use App\Domain\Notificacao\NotificacaoInterface;
use Hyperf\Guzzle\ClientFactory;

class NotificacaoService implements NotificacaoInterface
{
    private $client;

    public function __construct(private ClientFactory $clientFactory)
    {
        $this->client = $clientFactory->create();
    }

    public function notificar(): bool
    {
        $response = $this->client->request('POST', 'https://util.devi.tools/api/v1/notify');

        $data = json_decode((string) $response->getBody(), true);

        return isset($data['data']['authorization'])
            && $data['data']['authorization'] === true;
    }
}
