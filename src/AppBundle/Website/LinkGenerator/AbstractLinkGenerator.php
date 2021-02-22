<?php

namespace AppBundle\Website\LinkGenerator;

use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Http\Request\Resolver\DocumentResolver;
use Pimcore\Templating\Helper\PimcoreUrl;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class AbstractLinkGenerator implements LinkGeneratorInterface
{
    /**
     * @var PimcoreUrl
     */
    protected $pimcoreUrl;

    public function __construct(DocumentResolver $documentResolver, RequestStack $requestStack, PimcoreUrl $pimcoreUrl)
    {
        $this->pimcoreUrl = $pimcoreUrl;
    }
}
