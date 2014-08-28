<?php
/**
 * File containing the Section class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\SPI\Persistence\Content;

use eZ\Publish\SPI\Persistence\ValueObject;

/**
 */
class Section extends ValueObject
{
    /**
     * Id of the section
     *
     * @var int
     */
    public $id;

    /**
     * Unique identifier of the section
     *
     * @var string
     */
    public $identifier;

    /**
     * Name of the section
     *
     * @var string
     */
    public $name;
}
