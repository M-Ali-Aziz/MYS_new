<?php

declare(strict_types=1);

namespace App\Form;

use Pimcore\Model\DataObject\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class);
        if (!$options['hidePassword']) {
            $builder->add('password', PasswordType::class);
        }

        $builder
            ->add('oAuthKey', HiddenType::class)
            ->add('_submit', SubmitType::class);;
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined('hidePassword');
//        $resolver->setDefaults([
//            'data_class' => customer::class,
//            'allow_extra_fields' => true,
//        ]);
    }
}
