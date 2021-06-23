<?php

namespace App\Website\LinkGenerator;

use Pimcore\Http\Request\Resolver\DocumentResolver;
use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Twig\Extension\Templating\PimcoreUrl;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class AbstractLinkGenerator implements LinkGeneratorInterface
{
    protected DocumentResolver $documentResolver;
    protected RequestStack $requestStack;
    protected PimcoreUrl $pimcoreUrl;

    public function __construct(DocumentResolver $documentResolver, RequestStack $requestStack, PimcoreUrl $pimcoreUrl)
    {
        $this->documentResolver = $documentResolver;
        $this->requestStack = $requestStack;
        $this->pimcoreUrl = $pimcoreUrl;
    }
}
