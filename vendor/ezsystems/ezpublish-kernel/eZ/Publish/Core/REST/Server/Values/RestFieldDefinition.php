<?php
/**
 * File containing the RestFieldDefinition class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\API\Repository\Values\ContentType\ContentType;
use eZ\Publish\API\Repository\Values\ContentType\FieldDefinition;
use eZ\Publish\Core\REST\Common\Value as RestValue;

/**
 * RestFieldDefinition view model
 */
class RestFieldDefinition extends RestValue
{
    /**
     * ContentType the field definitions belong to
     *
     * @var \eZ\Publish\API\Repository\Values\ContentType\ContentType
     */
    public $contentType;

    /**
     * Field definition
     *
     * @var \eZ\Publish\API\Repository\Values\ContentType\FieldDefinition
     */
    public $fieldDefinition;

    /**
     * Construct
     *
     * @param \eZ\Publish\API\Repository\Values\ContentType\ContentType $contentType
     * @param \eZ\Publish\API\Repository\Values\ContentType\FieldDefinition $fieldDefinition
     */
    public function __construct( ContentType $contentType, FieldDefinition $fieldDefinition )
    {
        $this->contentType = $contentType;
        $this->fieldDefinition = $fieldDefinition;
    }
}
