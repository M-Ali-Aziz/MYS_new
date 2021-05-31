<?php

namespace App\Model\CustomerManagementFramework;

use Carbon\Carbon;
use CustomerManagementFrameworkBundle\Model\CustomerInterface;

interface PasswordRecoveryInterface
{
    /**
     * @param string $token
     *
     * @return CustomerInterface
     */
    public function setPasswordRecoveryToken(string $token): CustomerInterface;

    /**
     * @return string
     */
    public function getPasswordRecoveryToken(): string;

    /**
     * @param Carbon $tokenDate
     *
     * @return CustomerInterface
     */
    public function setPasswordRecoveryTokenDate(Carbon $tokenDate): CustomerInterface;

    /**
     * @return Carbon
     */
    public function getPasswordRecoveryTokenDate(): Carbon;

    /**
     * @return CustomerInterface
     */
    public function save(): CustomerInterface;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $password
     *
     * @return CustomerInterface
     */
    public function setPassword(string $password): CustomerInterface;
}
