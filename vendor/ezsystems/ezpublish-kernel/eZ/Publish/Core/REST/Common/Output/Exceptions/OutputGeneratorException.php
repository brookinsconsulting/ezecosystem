<?php
/**
 * File containing the OutputGeneratorException class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Common\Output\Exceptions;

/**
 * Invalid output generation
 */
class OutputGeneratorException extends \RuntimeException
{
    /**
     * Construct from error message
     *
     * @param string $message
     */
    public function __construct( $message )
    {
        parent::__construct(
            'Output visiting failed: ' . $message
        );
    }
}
