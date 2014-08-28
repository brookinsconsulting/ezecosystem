<?php
/**
 * File containing the CreatedUser class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * Struct representing a freshly created User.
 */
class CreatedUser extends ValueObject
{
    /**
     * The created user
     *
     * @var \eZ\Publish\Core\REST\Server\Values\RestUser
     */
    public $user;
}
