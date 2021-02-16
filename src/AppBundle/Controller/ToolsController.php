<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject\Tools;

class ToolsController extends BaseController
{
    /**
     * @Route("/tools", name="tolls_start")
     * @param Request $request
     */
    public function startAction(Request $request)
    {
    }

    /**
     * @Route("/preview/tool/{id}", name="tolls_preview")
     * @param Request $request
     */
    public function previewAction(Request $request, string $id)
    {
        try {
            // Get tool
            $tool = Tools::getById($id);

            return $this->render('tools/preview.html.twig', [
                'tool' => $tool,
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
