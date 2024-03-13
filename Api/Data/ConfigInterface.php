<?php
/**
 * @category  Collab
 * @package   Collab\GoogleOneTap
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\GoogleOneTap\Api\Data;

interface ConfigInterface
{
    public const CONFIG_CALLBACK_URL = 'googleonetap/index/index';
    public const XML_PATH_GOOGLE_ONETAP_ENABLED = 'collab_googleonetap/general/enabled';
    public const XML_PATH_GOOGLE_ONETAP_CLIENT_ID = 'collab_googleonetap/general/client_id';

    public function isEnabled(): bool;
    public function getClientId(): ?string;
    public function getFormKey(): string;
}
