<?php
/**
 * File containing the PolicyStub class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\API\Repository\Tests\Stubs\Values\User;

use eZ\Publish\API\Repository\Values\User\Policy;

/**
 * Stubbed implementation of the {@link \eZ\Publish\API\Repository\Values\User\Policy}
 * class.
 *
 * @see \eZ\Publish\API\Repository\Values\User\Policy
 */
class PolicyStub extends Policy
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
