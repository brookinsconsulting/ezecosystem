<?php
/**
 * File containing the RoleList class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\Core\REST\Common\Value as RestValue;

/**
 * Role list view model
 */
class RoleList extends RestValue
{
    /**
     * Roles
     *
     * @var \eZ\Publish\API\Repository\Values\User\Role[]
     */
    public $roles;

    /**
     * Path used to load the list of roles
     *
     * @var string
     */
    public $path;

    /**
     * Construct
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role[] $roles
     * @param string $path
     */
    public function __construct( array $roles, $path )
    {
        $this->roles = $roles;
        $this->path = $path;
    }
}
