<?php
/**
 * File containing the RoleStub class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\API\Repository\Tests\Stubs\Values\User;

use eZ\Publish\API\Repository\Values\User\Role;

/**
 * Stubbed implementation of the {@link \eZ\Publish\API\Repository\Values\User\Role}
 * class.
 *
 * @see \eZ\Publish\API\Repository\Values\User\Role
 */
class RoleStub extends Role
{
    /**
     * @var \eZ\Publish\API\Repository\Values\User\Policy[]
     */
    protected $policies;

    /**
     * Instantiates a role stub instance.
     *
     * @param array $properties
     * @param \eZ\Publish\API\Repository\Values\User\Policy[] $policies
     */
    public function __construct( array $properties = array(), array $policies = array() )
    {
        parent::__construct( $properties );

        $this->policies = $policies;
    }

    /**
     * Returns the list of policies of this role
     * @return \eZ\Publish\API\Repository\Values\User\Policy[]
     */
    public function getPolicies()
    {
        return $this->policies;
    }
}
