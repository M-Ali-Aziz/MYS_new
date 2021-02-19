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
     * @Route({
     *     "en": "en/tools/{id<\d+>}",
     *     "sv": "sv/verktyg/{id<\d+>}"
     * }, name="tools_detail")
     * @param Request $request
     */
     public function detailAction(Request $request, int $id)
     {
         try {
             // Get tool
             $tool = Tools::getById($id);

             $videoBaseUrl = [
                 'youtube' => 'https://www.youtube.com/embed/',
                 'vimeo' => 'https://player.vimeo.com/video/',
                 'dailymotion' => 'https://www.dailymotion.com/embed/video/'
             ];

             return $this->render('tools/detail.html.twig', [
                 'tool' => $tool,
                 'videoBaseUrl' => $videoBaseUrl,
             ]);
         } catch (\Exception $e) {
             $e->getMessage();
         }
     }

    /**
     * @Route("/preview/tool/{id}", name="tolls_preview")
     * @param Request $request
     */
    public function previewAction(Request $request, int $id)
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
