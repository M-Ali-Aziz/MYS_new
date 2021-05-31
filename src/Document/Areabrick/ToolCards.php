<?php
namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\DataObject\Tools;

/**
 * Tool Card Areabrick
 */
class ToolCards extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Tool Cards';
    }

    public function getDescription(): string
    {
        return 'Get Tool Cards for start page';
    }

    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_GLOBAL;
    }

    public function getIcon(): string
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
        $info->setParam('tools', $tools);
    }
}
