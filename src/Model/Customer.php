<?php

namespace App\Model;

use App\Model\CustomerManagementFramework\PasswordRecoveryInterface;
use CustomerManagementFrameworkBundle\Model\SsoAwareCustomerInterface;
use Pimcore\Model\DataObject\Data\Consent;

class Customer extends \Pimcore\Model\DataObject\Customer implements SsoAwareCustomerInterface, PasswordRecoveryInterface
{
//    /**
//     * @return Consent|null
//     */
//    public function getProfilingConsent(): ?Consent
//    {
//        return method_exists($this, 'getProfiling') ? $this->getProfiling()->getConsent() : null;
//    }
}
