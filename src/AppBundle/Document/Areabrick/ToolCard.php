<?php
namespace AppBundle\Document\Areabrick;

use Pimcore\Model\Document\Tag\Area\Info;
use Pimcore\Model\DataObject\Tools;

/**
 * Tool Card Areabrick
 */
class ToolCard extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Tool Card';
    }

    /**
     * @inheritdoc
     */
    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/four-squares.svg';
    }

    // !!! Other methods defined above
    /**
     * Action Method
     * Action method to prepare data for the view
     *
     * @param Info $info
     */
    public function action(Info $info)
    {
        // Tools Listing
        $tools = new Tools\Listing();

        // Assign variable to view
        $info->getView()->tools = $tools ?? null;
    }
}
