<?php
/**
 * @category  Collab
 * @package   Collab\GoogleOneTap
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\GoogleOneTap\Controller\Index;

use Collab\CustomerPasswordLessLogin\Service\LoginWithoutPassword;
use Collab\GoogleOneTap\Service\GoogleApiClient;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;

class Index implements HttpPostActionInterface
{
    public function __construct(
        protected GoogleApiClient $googleApiClient,
        protected RequestInterface $request,
        protected ResultFactory $resultFactory,
        protected LoginWithoutPassword $loginWithoutPassword,
        protected Session $customerSession,
        protected ManagerInterface $messageManager
    ) {
    }

    public function execute(): ResultInterface
    {
        $credential = $this->request->getParam('credential');
        $payload = $this->googleApiClient->getUserInfo($credential);

        if (!count($payload)) {
            $this->messageManager->addErrorMessage(__('Invalid credentials.'));
        } else {
            $this->loginWithoutPassword->login([
                'email' => $payload['email'],
                'firstName' => $payload['given_name'],
                'lastName' => $payload['family_name']
            ]);

            $this->messageManager->addSuccessMessage(__('You have been successfully logged in.'));
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath($this->customerSession->getBeforeAuthUrl());
    }
}
