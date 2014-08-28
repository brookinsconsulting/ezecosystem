<?php
/**
 * File containing the Handler base class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Common\Input;

/**
 * Input format handler base class
 */
abstract class Handler
{
    /**
     * Converts the given string to an array structure
     *
     * @param string $string
     *
     * @return array
     */
    abstract public function convert( $string );
}
