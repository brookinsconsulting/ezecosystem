<?php
/**
 * File containing the Content class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\SPI\Persistence;

/**
 * Content value object, bound to a version.
 * This object aggregates the following:
 *  - Version metadata
 *  - Content metadata
 *  - Fields
 *  - Locations
 */
class Content extends ValueObject
{
    /**
     * VersionInfo object for this content's version.
     *
     * @var \eZ\Publish\SPI\Persistence\Content\VersionInfo
     */
    public $versionInfo;

    /**
     * Field objects for this content.
     *
     * @var \eZ\Publish\SPI\Persistence\Content\Field[]
     */
    public $fields;
}
