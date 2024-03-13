<?php
/**
 * @category  Collab
 * @package   Collab\GoogleOneTap
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\GoogleOneTap\Model\Data;

use Collab\GoogleOneTap\Api\Data\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Data\Form\FormKey as CsrfFormKey;
use Magento\Framework\DataObject;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Store\Model\ScopeInterface;

class Config extends DataObject implements ConfigInterface
{

    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
        protected EncryptorInterface $encryptor,
        protected CsrfFormKey $formKey,
        array $data = []
    ) {
        parent::__construct($data);
    }

    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_GOOGLE_ONETAP_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getClientId(): ?string
    {
        return $this->encryptor->decrypt(
            $this->scopeConfig->getValue(
                self::XML_PATH_GOOGLE_ONETAP_CLIENT_ID,
                ScopeInterface::SCOPE_STORE
            )
        );
    }

    /**
     * @throws LocalizedException
     */
    public function getFormKey(): string
    {
        return $this->formKey->getFormKey();
    }
}
