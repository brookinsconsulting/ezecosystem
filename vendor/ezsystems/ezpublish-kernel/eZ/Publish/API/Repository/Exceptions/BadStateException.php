<?php
/**
 * File containing the eZ\Publish\API\Repository\Exceptions\BadStateException class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\API\Repository\Exceptions;

/**
 * This Exception is thrown if a method is called with an value referencing an object which is not in the right state
 */
abstract class BadStateException extends ForbiddenException
{
}
