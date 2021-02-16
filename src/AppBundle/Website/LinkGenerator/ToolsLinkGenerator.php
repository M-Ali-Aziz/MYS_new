<?php

namespace AppBundle\Website\LinkGenerator;

use Pimcore\Bundle\EcommerceFrameworkBundle\Model\ProductInterface;
use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Tools;

class ToolsLinkGenerator implements LinkGeneratorInterface
{
    /**
     * @param Concrete $object
     * @param array $params
     *
     * @return string
     */
    public function generate(Concrete $object, array $params = []): string
    {
        if (!($object instanceof Tools)) {
            throw new \InvalidArgumentException('Given object is no tool');
        }

        return '/preview/tool/' . $object->getId();
    }
}