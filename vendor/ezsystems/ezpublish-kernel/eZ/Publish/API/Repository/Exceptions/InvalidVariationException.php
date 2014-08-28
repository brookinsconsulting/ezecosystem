<?php
/**
 * File containing the InvalidVariationException class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\API\Repository\Exceptions;

class InvalidVariationException extends InvalidArgumentException
{
    public function __construct( $variationName, $variationType, $code = 0, Exception $previous = null )
    {
        parent::__construct( "Invalid variation '$variationName' for $variationType", $code, $previous );
    }
}
