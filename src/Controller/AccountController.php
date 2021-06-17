<?php

namespace App\Controller;

use App\Form\LoginFormType;
use App\Form\RegistrationFormHandler;
use App\Form\RegistrationFormType;
use CustomerManagementFrameworkBundle\CustomerProvider\CustomerProviderInterface;
use CustomerManagementFrameworkBundle\CustomerSaveValidator\Exception\DuplicateCustomerException;
use CustomerManagementFrameworkBundle\Model\CustomerInterface;
use App\Services\PasswordRecoveryService;
use CustomerManagementFrameworkBundle\Security\Authentication\LoginManagerInterface;
use Pimcore\Controller\FrontendController;
use Pimcore\Translation\Translator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
class AccountController extends FrontendController
{
    /**
     *
     * @Route("/account/login", name="account_login")
     *
     * @param AuthenticationUtils $authenticationUtils
     * @param SessionInterface $session
     * @param Request $request
     * @param UserInterface|null $user
     *
     * @return Response|RedirectResponse
     */
    public function loginAction(
        AuthenticationUtils $authenticationUtils,
        SessionInterface $session,
        Request $request,
        UserInterface $user = null
    ): RedirectResponse|Response
    {

        // Redirect user to tools-start page if logged in
        if ($user && $this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('tools_start');
        }

        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $formData = [
            '_username' => $lastUsername
        ];

        $form = $this->createForm(LoginFormType::class, $formData, [
            'action' => $this->generateUrl('account_login'),
        ]);

        // Store referer in session to get redirected after login
        if (!$request->get('no-referer-redirect')) {
            $session->set('_security.mys_main.target_path', $request->headers->get('referer'));
        }

        return $this->render('account/login.html.twig', [
            'form' => $form->createView(),
            'error' => $error
        ]);
    }

    /**
     * @Route("/account/register", name="account_register")
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
     * @return Response|RedirectResponse
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

    ): RedirectResponse|Response
    {
        // Redirect user to index page if logged in
        if ($user && $this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('account_index');
        }

        // Create a new, empty customer instance
        /** @var CustomerInterface|\Pimcore\Model\DataObject\Customer $customer */
        $customer = $customerProvider->create();

        // The registration form handler is just a utility class to map pimcore object data to form and vice versa.
        $formData = $registrationFormHandler->buildFormData($customer);
        $hidePassword = false;

        // Build the registration form and pre-fill it with customer data
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
                    $response = $this->redirectToRoute('account_index');
                }

                // Log user in manually
                // Pass response to login manager as it adds potential remember me cookies
                $loginManager->login($customer, $request, $response);

                return $response;
            } catch (DuplicateCustomerException $e) {
                $errors[] = $translator->trans(
                    'account.customer_already_exists',
                    [
                        $customer->getEmail(),
                        $urlGenerator->generate('account_password_send_recovery', ['email' => $customer->getEmail()])
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

        return $this->render('account/register.html.twig', [
            'customer' => $customer,
            'form' => $form->createView(),
            'errors' => $errors,
            'hidePassword' => $hidePassword
        ]);
    }

    /**
     * @Template
     *
     * @Route("/account/send-password-recovery", name="account_password_send_recovery")
     *
     * @param Request $request
     * @param PasswordRecoveryService $service
     * @param Translator $translator
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function sendPasswordRecoveryMailAction(Request $request, PasswordRecoveryService $service, Translator $translator): Response
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $service->sendRecoveryMail($request->get('email', ''), $this->document->getProperty('password_reset_mail'));
            $this->addFlash('success', $translator->trans('account.reset_mail_sent_when_possible'));

            return $this->redirectToRoute('account_login', [
                'no-referer-redirect' => true,
                'email' => $request->get('email')
            ]);
        }

        return $this->render('account/send_password_recovery_mail.html.twig', [
            'email' => $request->get('email')
        ]);
    }

    /**
     * @Template
     *
     * @Route("/account/reset-password", name="account_reset_password")
     *
     * @param Request $request
     * @param PasswordRecoveryService $service
     * @param Translator $translator
     *
     * @return Response|RedirectResponse
     */
    public function resetPasswordAction(Request $request, PasswordRecoveryService $service, Translator $translator): RedirectResponse|Response
    {
        $token = $request->get('token');
        $customer = $service->getCustomerByToken($token);

        if (!$customer) {
            $this->addFlash('danger', $translator->trans('account.password_reset_token_failed'));

            return $this->redirectToRoute('account_login');
        }

        if ($request->isMethod(Request::METHOD_POST)) {
            $newPassword = $request->get('password');
            $service->setPassword($token, $newPassword);

            $this->addFlash('success', $translator->trans('account.password_reset_successful'));

            return $this->redirectToRoute('account_login', ['no-referer-redirect' => true]);
        }

        return $this->render('account/reset_password.html.twig', [
            'token' => $token,
            'email' => $customer->getEmail()
        ]);
    }

    /**
     * Index page for account
     *
     * @Route("/account/index", name="account_index")
     * @Security("is_granted('ROLE_USER')")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        return $this->render('account/index.html.twig');
    }
}
