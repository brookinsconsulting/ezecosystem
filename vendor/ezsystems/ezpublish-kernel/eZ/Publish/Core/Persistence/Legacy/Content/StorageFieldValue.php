<?php
/**
 * File containing the StorageFieldValue class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\Persistence\Legacy\Content;

use eZ\Publish\SPI\Persistence\ValueObject;

class StorageFieldValue extends ValueObject
{
    /**
     * Float data.
     *
     * @var float
     */
    public $dataFloat;

    /**
     * Integer data.
     *
     * @var int
     */
    public $dataInt;

    /**
     * Text data.
     *
     * @var string
     */
    public $dataText;

    /**
     * Integer sort key.
     *
     * @var int
     */
    public $sortKeyInt = 0;

    /**
     * Text sort key.
     *
     * @var string
     */
    public $sortKeyString = '';
}
