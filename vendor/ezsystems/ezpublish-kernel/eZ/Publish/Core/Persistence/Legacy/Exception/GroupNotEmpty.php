<?php
/**
 * File containing the GroupNotEmpty exception class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\Persistence\Legacy\Exception;

use eZ\Publish\Core\Base\Exceptions\BadStateException;

/**
 * Exception thrown if a Content\Type\Group is to be deleted which is not
 * empty.
 */
class GroupNotEmpty extends BadStateException
{
    /**
     * Creates a new exception for $groupId
     *
     * @param mixed $groupId
     */
    public function __construct( $groupId )
    {
        parent::__construct(
            '$groupId',
            sprintf( 'Group with ID "%s" is not empty.', $groupId )
        );
    }
}
