<?php
/**
 * @category  Collab
 * @package   Collab\GoogleOneTap
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\GoogleOneTap\ViewModel;

use Collab\GoogleOneTap\Api\Data\ConfigInterface;
use Magento\Framework\Data\Form\FormKey as CsrfFormKey;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class GoogleOneTapConfig implements ArgumentInterface
{
    public function __construct(
        protected UrlInterface $url,
        protected CsrfFormKey $formKey,
        protected ConfigInterface $config
    ) {
    }

    public function getCallbackUrl(): string
    {
        return $this->url->getUrl(ConfigInterface::CONFIG_CALLBACK_URL);
    }

    /**
     * @throws LocalizedException
     */
    public function getFormKey(): string
    {
        return $this->formKey->getFormKey();
    }

    public function getClientId(): ?string
    {
        return $this->config->getClientId();
    }
}
