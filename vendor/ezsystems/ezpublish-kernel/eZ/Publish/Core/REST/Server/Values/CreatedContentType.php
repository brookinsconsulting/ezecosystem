<?php
/**
 * File containing the CreatedContentType class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * Struct representing a freshly created ContentType.
 */
class CreatedContentType extends ValueObject
{
    /**
     * The created content type
     *
     * @var \eZ\Publish\Core\REST\Server\Values\RestContentType
     */
    public $contentType;
}
