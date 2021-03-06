<?php
/**
 * File containing the LocationConfigured class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Bundle\EzPublishCoreBundle\View\Provider;

use eZ\Publish\Core\MVC\Symfony\SiteAccess\SiteAccessAware;
use eZ\Publish\Core\MVC\Symfony\SiteAccess;
use eZ\Publish\Core\MVC\Symfony\View\Provider\Location\Configured;

class LocationConfigured extends Configured implements SiteAccessAware
{
    /**
     * Changes SiteAccess.
     *
     * @param SiteAccess $siteAccess
     */
    public function setSiteAccess( SiteAccess $siteAccess = null )
    {
        if ( $this->matcherFactory instanceof SiteAccessAware )
        {
            $this->matcherFactory->setSiteAccess( $siteAccess );
        }
    }
}
