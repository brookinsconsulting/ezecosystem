<?php
/**
 * File containing the GatewayCachePurger interface.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Symfony\Cache;

/**
 * Interface for gateway cache purgers.
 */
interface GatewayCachePurger
{
    /**
     * Triggers the cache purge of given $cacheElements.
     * It's up to the implementor to decide whether to purge $cacheElements right away or to delegate to a separate process.
     *
     * @param mixed $cacheElements
     *
     * @return mixed
     */
    public function purge( $cacheElements );

    /**
     * Triggers the cache purge for all content in cache.
     *
     * @return mixed
     */
    public function purgeAll();
}
