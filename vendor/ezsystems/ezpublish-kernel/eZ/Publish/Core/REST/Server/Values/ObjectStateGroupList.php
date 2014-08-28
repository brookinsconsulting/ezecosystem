<?php
/**
 * File containing the ObjectStateGroupList class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\Core\REST\Common\Value as RestValue;

/**
 * ObjectStateGroup list view model
 */
class ObjectStateGroupList extends RestValue
{
    /**
     * Object state groups
     *
     * @var \eZ\Publish\API\Repository\Values\ObjectState\ObjectStateGroup[]
     */
    public $groups;

    /**
     * Construct
     *
     * @param \eZ\Publish\API\Repository\Values\ObjectState\ObjectStateGroup[] $groups
     */
    public function __construct( array $groups )
    {
        $this->groups = $groups;
    }
}
