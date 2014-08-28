<?php
/**
 * File containing the eZ\Publish\Core\Repository\Values\User\Role class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\Repository\Values\User;

use eZ\Publish\API\Repository\Values\User\Role as APIRole;

/**
 * This class represents a role
 *
 * @property-read \eZ\Publish\API\Repository\Values\User\Policy[] $policies Policies assigned to this role
 */
class Role extends APIRole
{
    /**
     * Policies assigned to this role
     *
     * @var \eZ\Publish\API\Repository\Values\User\Policy[]
     */
    protected $policies = array();

    /**
     * Returns the list of policies of this role
     * @return \eZ\Publish\API\Repository\Values\User\Policy[]
     */
    public function getPolicies()
    {
        return $this->policies;
    }
}
