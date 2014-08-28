<?php
/**
 * File containing the Language class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\SPI\Persistence\Content;

use eZ\Publish\SPI\Persistence\ValueObject;

/**
 * Struct containing accessible properties on Language entities.
 */
class Language extends ValueObject
{
    /**
     * Language ID.
     *
     * @var mixed
     */
    public $id;

    /**
     * Language Code (eg: eng-GB)
     *
     * @var string
     */
    public $languageCode;

    /**
     * Human readable language name
     *
     * @var string
     */
    public $name;

    /**
     * Indicates if language is enabled or not
     *
     * @var boolean
     */
    public $isEnabled = true;
}
