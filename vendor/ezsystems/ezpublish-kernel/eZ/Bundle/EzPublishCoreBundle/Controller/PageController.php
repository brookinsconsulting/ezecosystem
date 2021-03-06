<?php
/**
 * File containing the PageController class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Bundle\EzPublishCoreBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\FieldType\Page\PageService as CoreBundlePageService;
use eZ\Publish\Core\FieldType\Page\Parts\Block;
use eZ\Publish\Core\MVC\Symfony\Controller\PageController as BasePageController;

class PageController extends BasePageController
{
    public function viewBlock( Block $block, array $params = array(), array $cacheSettings = array() )
    {
        // Inject valid items as ContentInfo objects if possible.
        if ( $this->pageService instanceof CoreBundlePageService )
        {
            $params += array(
                'valid_contentinfo_items' => $this->pageService->getValidBlockItemsAsContentInfo( $block )
            );
        }

        return parent::viewBlock( $block, $params, $cacheSettings );
    }
}
