<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject\Tools;

class ToolsController extends FrontendController
{
    /**
     * @Route("/tools", name="tools_start")
     * @param Request $request
     * @return Response
     */
    public function startAction(Request $request): Response
    {
        return $this->render('tools/start.html.twig');
    }

    /**
     * @Route("/tools/{tool}", name="tools_detail",  requirements={"tool"="\d+"})
     * @param Request $request
     * @param Tools $tool
     * @return Response
     */
    public function detailAction(Request $request, Tools $tool): Response
    {
        // Set document parent id for dynamic page
        $docParentId = $request->get('contentDocument')->getParentId();

        // Set video embed base url
        $videoBaseUrl = [
            'youtube' => 'https://www.youtube.com/embed/',
            'vimeo' => 'https://player.vimeo.com/video/',
            'dailymotion' => 'https://www.dailymotion.com/embed/video/'
        ];

        return $this->render('tools/detail.html.twig', [
            'tool' => $tool,
            'video_base_url' => $videoBaseUrl,
            'doc_parent_id' => $docParentId,
            // TODO: send page title for dynamic page
        ]);
    }

    /**
     * @Route("/preview/tools/{tool}", name="tools_preview")
     * @param Request $request
     * @param Tools $tool
     * @return Response
     */
    public function previewAction(Request $request, Tools $tool): Response
    {
        return $this->render('tools/preview.html.twig', [
            'tool' => $tool,
        ]);
    }
}
