<?php
/**
 * File containing the NoVisitorFoundException class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Common\Output\Exceptions;

/**
 * No output visitor found exception
 */
class NoVisitorFoundException extends \RuntimeException
{
    /**
     * Construct from tested classes
     *
     * @param array $classes
     */
    public function __construct( array $classes )
    {
        parent::__construct(
            sprintf(
                "No visitor found for %s!",
                implode( ', ', $classes )
            )
        );
    }
}
