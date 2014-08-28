<?php
/**
 * File containing the Policy class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Client\Values\User;

/**
 * Implementation of the {@link \eZ\Publish\API\Repository\Values\User\Policy}
 * class.
 *
 * @see \eZ\Publish\API\Repository\Values\User\Policy
 */
class Policy extends \eZ\Publish\API\Repository\Values\User\Policy
{
    /**
     * @var \eZ\Publish\API\Repository\Values\User\Limitation[]
     */
    protected $limitations = array();

    /**
     * @return \eZ\Publish\API\Repository\Values\User\Limitation[]
     */
    public function getLimitations()
    {
        return $this->limitations;
    }
}
