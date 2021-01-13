<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContentController extends BaseController
{   
    /**
     * @Template
     * @param Request $request
     */
    public function defaultAction(Request $request)
    {
    }

    /**
     * @Template
     * @param Request $request
     */
    public function startAction(Request $request)
    {
    }
}
