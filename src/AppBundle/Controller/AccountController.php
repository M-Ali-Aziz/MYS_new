<?php

namespace AppBundle\Controller;

use AppBundle\Form\LoginFormType;
use AppBundle\Form\RegistrationFormHandler;
use AppBundle\Form\RegistrationFormType;
use CustomerManagementFrameworkBundle\CustomerProvider\CustomerProviderInterface;
use CustomerManagementFrameworkBundle\CustomerSaveValidator\Exception\DuplicateCustomerException;
use CustomerManagementFrameworkBundle\Model\CustomerInterface;
use CustomerManagementFrameworkBundle\Security\Authentication\LoginManagerInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Factory;
use Pimcore\Translation\Translator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class AccountController
 *
 * Controller that handles all account functionality, including register and login
 */
class AccountController extends BaseController
{
    /**
     * @Route("/account/login", name="account-login")
     *
     * @param AuthenticationUtils $authenticationUtils
     * @param SessionInterface $session
     * @param Request $request
     * @param UserInterface|null $user
     *
     * @return array|RedirectResponse
     */
    public function loginAction(
        AuthenticationUtils $authenticationUtils,
        SessionInterface $session,
        Request $request,
        UserInterface $user = null
    ) {

        // Redirect user to index page if logged in
        if ($user && $this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('account-index');
        }

        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $formData = [
            '_username' => $lastUsername
        ];

        $form = $this->createForm(LoginFormType::class, $formData, [
            'action' => $this->generateUrl('account-login'),
        ]);

        return [
            'form' => $form->createView(),
            'error' => $error
        ];
    }

    /**
     *
     * @Route("/account/register", name="account-register")
     *
     * @param Request $request
     * @param CustomerProviderInterface $customerProvider
     * @param LoginManagerInterface $loginManager
     * @param RegistrationFormHandler $registrationFormHandler
     * @param SessionInterface $session
     * @param Translator $translator
     * @param UrlGeneratorInterface $urlGenerator
     * @param UserInterface|null $user
     *
     * @return array|RedirectResponse
     */
    public function registerAction(
        Request $request,
        CustomerProviderInterface $customerProvider,
        LoginManagerInterface $loginManager,
        RegistrationFormHandler $registrationFormHandler,
        SessionInterface $session,
        Translator $translator,
        UrlGeneratorInterface $urlGenerator,
        UserInterface $user = null

    ) {
        // Redirect user to index page if logged in
        if ($user && $this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('account-index');
        }

        // Create a new, empty customer instance
        /** @var CustomerInterface|\Pimcore\Model\DataObject\Customer $customer */
        $customer = $customerProvider->create();

        // The registration form handler is just a utility class to map pimcore object data to form and vice versa.
        $formData = $registrationFormHandler->buildFormData($customer);
        $hidePassword = false;

        // build the registration form and pre-fill it with customer data
        $form = $this->createForm(RegistrationFormType::class, $formData, ['hidePassword' => $hidePassword]);
        $form->handleRequest($request);

        $errors = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $registrationFormHandler->updateCustomerFromForm($customer, $form);
            $customer->setCustomerLanguage($request->getLocale());
            $customer->setActive(true);

            try {
                $customer->save();

                // Check if special redirect is necessary
                if ($session->get('referrer')) {
                    $response = $this->redirect($session->get('referrer'));
                    $session->remove('referrer');
                } else {
                    $response = $this->redirectToRoute('account-index');
                }

                // log user in manually
                // pass response to login manager as it adds potential remember me cookies
                $loginManager->login($customer, $request, $response);

                // TODO $this->addFlash()
                // https://symfony.com/doc/4.4/controller.html#flash-messages
                // https://symfony.com/doc/4.4/session.html#avoid-starting-sessions-for-anonymous-users

                return $response;
            } catch (DuplicateCustomerException $e) {
                $errors[] = $translator->trans(
                    'account.customer-already-exists',
                    [
                        $customer->getEmail(),
                        $urlGenerator->generate('account-password-send-recovery', ['email' => $customer->getEmail()])
                    ]
                );
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            foreach ($form->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }
        }

        return [
            'customer' => $customer,
            'form' => $form->createView(),
            'errors' => $errors,
            'hidePassword' => $hidePassword
        ];
    }

    /**
     * Index page for account
     *
     * @Route("/account/index", name="account-index")
     */
    public function indexAction()
    {
        return new Response(
            '<h1>index page</h1>'
        );
    }
}
