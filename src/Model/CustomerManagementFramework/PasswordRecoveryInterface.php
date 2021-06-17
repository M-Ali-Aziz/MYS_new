<?php

namespace App\Model\CustomerManagementFramework;

use Carbon\Carbon;
use CustomerManagementFrameworkBundle\Model\CustomerInterface;

interface PasswordRecoveryInterface
{
    /**
     * @param string|null $token
     *
     * @return CustomerInterface
     */
    public function setPasswordRecoveryToken(?string $token);

    /**
     * @return string
     */
    public function getPasswordRecoveryToken(): ?string;

    /**
     * @param Carbon|null $tokenDate
     *
     * @return CustomerInterface
     */
    public function setPasswordRecoveryTokenDate(?Carbon $tokenDate);

    /**
     * @return Carbon|null
     */
    public function getPasswordRecoveryTokenDate(): ?Carbon;

    /**
     * @return CustomerInterface
     */
    public function save();

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @param string|null $password
     *
     * @return CustomerInterface
     */
    public function setPassword(?string $password);
}
