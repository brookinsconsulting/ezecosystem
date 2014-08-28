<?php
/**
 * File containing the LocationPurger class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Symfony\Cache\Http;

/**
 * Interface allowing for HttpCache stores to purge specific content.
 * When purging content by locationId, purgeByRequest() would receive a Request object with X-Location-Id or X-Group-Location-Id headers
 * indicating which locations to purge.
 */
interface ContentPurger extends RequestAwarePurger
{
    /**
     * Purges all cached content
     *
     * @return boolean
     */
    public function purgeAllContent();
}
