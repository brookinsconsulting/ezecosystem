<?php
/**
 * TrashSignal class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot\Signal\TrashService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * TrashSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\TrashService
 */
class TrashSignal extends Signal
{
    /**
     * LocationId
     *
     * @var mixed
     */
    public $locationId;
}
