<?php
/**
 * File containing the eZ\Publish\API\Repository\Values\Message class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 * @package eZ\Publish\API\Repository\Values
 */

namespace eZ\Publish\API\Repository\Values;

/**
 * Base class fro translation messages.
 *
 * Use its extensions: Translation\Singular, Translation\Plural.
 *
 * @package eZ\Publish\API\Repository\Values
 */
abstract class Translation extends ValueObject
{
}

