<?php
/**
 * File containing the InstantCachePurger class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Symfony\Cache\Http;

use eZ\Publish\Core\MVC\Symfony\Cache\GatewayCachePurger;
use eZ\Publish\Core\MVC\Symfony\Cache\PurgeClientInterface;

class InstantCachePurger implements GatewayCachePurger
{
    /**
     * @var \eZ\Publish\Core\MVC\Symfony\Cache\PurgeClientInterface
     */
    private $purgeClient;

    public function __construct( PurgeClientInterface $purgeClient )
    {
        $this->purgeClient = $purgeClient;
    }

    /**
     * Instantly triggers the cache purge of given $cacheElements.
     *
     * @param mixed $cacheElements
     *
     * @return mixed
     */
    public function purge( $cacheElements )
    {
        $this->purgeClient->purge( $cacheElements );

        return $cacheElements;
    }

    public function purgeAll()
    {
        $this->purgeClient->purgeAll();
    }
}
