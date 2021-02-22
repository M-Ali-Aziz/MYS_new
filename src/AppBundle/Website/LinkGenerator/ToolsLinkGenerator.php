<?php

namespace AppBundle\Website\LinkGenerator;

use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Tools;

class ToolsLinkGenerator extends AbstractLinkGenerator implements LinkGeneratorInterface
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

        return $this->pimcoreUrl->__invoke(
            ['id' => $object->getId()],
            'tools_preview'
        );
    }
}
