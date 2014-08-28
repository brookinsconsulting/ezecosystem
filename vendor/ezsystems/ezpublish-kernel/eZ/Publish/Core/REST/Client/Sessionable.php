<?php
/**
 * File containing the Sessionable interface
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Client;

/**
 * Implementation of the {@link \eZ\Publish\API\Repository\SectionService}
 * interface.
 *
 * @see \eZ\Publish\API\Repository\SectionService
 */
interface Sessionable
{
    /**
     * Set session ID
     *
     * Only for testing
     *
     * @param mixed tringid
     *
     * @private
     *
     * @return void
     */
    public function setSession( $id );
}

