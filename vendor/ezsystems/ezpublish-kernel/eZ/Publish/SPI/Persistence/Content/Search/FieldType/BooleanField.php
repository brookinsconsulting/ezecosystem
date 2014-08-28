<?php
/**
 * File containing the eZ\Publish\SPI\Persistence\Content\Search\FieldType\BooleanField class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */
namespace eZ\Publish\SPI\Persistence\Content\Search\FieldType;

use eZ\Publish\SPI\Persistence\Content\Search\FieldType;

/**
 * Boolean document field
 */
class BooleanField extends FieldType
{
    /**
     * The type name of the facet. Has to be handled by the solr schema.
     *
     * @var string
     */
    protected $type = 'ez_boolean';
}

