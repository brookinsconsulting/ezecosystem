<?php
/**
 * File containing the RequestAwarePurger interface.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Symfony\Cache\Http;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface allowing implementor (cache Store) to purge Http cache from a request object.
 */
interface RequestAwarePurger
{
    /**
     * Purges data from $request
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return boolean True if purge was successful. False otherwise
     */
    public function purgeByRequest( Request $request );
}
