<?php
/**
 * File containing the Rating Value class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\FieldType\Rating;

use eZ\Publish\Core\FieldType\Value as BaseValue;

/**
 * Value for Rating field type
 */
class Value extends BaseValue
{
    /**
     * Is rating disabled
     *
     * @var boolean
     */
    public $isDisabled = false;

    /**
     * Construct a new Value object and initialize it with its $isDisabled state
     *
     * @param boolean $isDisabled
     */
    public function __construct( $isDisabled = false )
    {
        $this->isDisabled = (bool)$isDisabled;
    }

    /**
     * @see \eZ\Publish\Core\FieldType\Value
     */
    public function __toString()
    {
        return $this->isDisabled ? "1" : "0";
    }
}
