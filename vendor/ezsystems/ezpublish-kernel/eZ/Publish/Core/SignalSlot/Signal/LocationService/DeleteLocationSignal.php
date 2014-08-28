<?php
/**
 * DeleteLocationSignal class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot\Signal\LocationService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * DeleteLocationSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\LocationService
 */
class DeleteLocationSignal extends Signal
{
    /**
     * ContentId
     *
     * @var mixed
     */
    public $contentId;

    /**
     * Location ID
     *
     * @var mixed
     */
    public $locationId;
}
