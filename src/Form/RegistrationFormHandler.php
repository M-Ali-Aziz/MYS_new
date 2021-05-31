<?php

namespace App\Form;

use CustomerManagementFrameworkBundle\Model\CustomerInterface;
use Symfony\Component\Form\Form;

class RegistrationFormHandler
{
    protected function getFormDataMapping(): array
    {
        return [
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'email' => 'email',
        ];
    }

    protected function getCustomerMapping(): array
    {
        $mapping = $this->getFormDataMapping();
        $mapping['password'] = 'password';

        return $mapping;
    }

    /**
     * Builds initial form data
     *
     * @param CustomerInterface $customer
     *
     * @return array
     */
    public function buildFormData(CustomerInterface $customer): array
    {
        $formData = [];
        foreach ($this->getFormDataMapping() as $formField => $customerProperty) {
            $getter = 'get' . ucfirst($customerProperty);

            $value = $customer->$getter();
            if (!$value) {
                continue;
            }

            $formData[$formField] = $value;
        }

        return $formData;
    }

    /**
     * Maps form values to customer
     *
     * @param CustomerInterface $customer
     * @param Form $form
     */
    public function updateCustomerFromForm(CustomerInterface $customer, Form $form)
    {
        if (!$form->isSubmitted() || !$form->isValid()) {
            throw new \RuntimeException('Form must be submitted and valid to apply form data');
        }

        $formData = $form->getData();
        foreach ($this->getCustomerMapping() as $formField => $customerProperty) {
            $setter = 'set' . ucfirst($customerProperty);

            $value = $formData[$formField] ?? null;
            if (!$value) {
                continue;
            }

            $customer->$setter($value);
        }
    }
}
