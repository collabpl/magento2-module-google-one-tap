<?php
/**
 * @category  Collab
 * @package   Collab\GoogleOneTap
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\GoogleOneTap\Service;

use Collab\GoogleOneTap\Api\Data\ConfigInterface;
use Google\Client;

class GoogleApiClient
{
    public function __construct(
        protected Client $client,
        protected ConfigInterface $config
    ) {
        $this->client = new Client([
            'client_id' => $this->config->getClientId()
        ]);
    }

    public function getUserInfo(string $credential): array
    {
        $payload = $this->client->verifyIdToken($credential);
        return $payload ?: [];
    }
}
