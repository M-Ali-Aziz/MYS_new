<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends FrontendController
{
    /**
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function defaultAction(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function startAction(Request $request)
    {
        return $this->render('content/start.html.twig');
    }
}
