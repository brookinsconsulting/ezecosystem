<?php
/**
 * File containing the ContentObjectStates class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Common\Values;

use eZ\Publish\Core\REST\Common\Value as RestValue;

/**
 * ContentObjectStates view model
 */
class ContentObjectStates extends RestValue
{
    /**
     * Object states
     *
     * @var array
     */
    public $states;

    /**
     * Construct
     *
     * @param array $states
     */
    public function __construct( array $states )
    {
        $this->states = $states;
    }
}
