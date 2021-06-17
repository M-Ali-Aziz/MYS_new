<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Template
     * @param Request $request
     * @return array
     */
    public function defaultAction(Request $request): array
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function genericMailAction(Request $request)
    {
        return $this->render('default/generic_mail.html.twig');
    }
}
