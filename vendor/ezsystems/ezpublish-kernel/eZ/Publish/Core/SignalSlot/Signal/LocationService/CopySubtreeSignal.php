<?php
/**
 * CopySubtreeSignal class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot\Signal\LocationService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * CopySubtreeSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\LocationService
 */
class CopySubtreeSignal extends Signal
{
    /**
     * SubtreeId
     *
     * @var mixed
     */
    public $subtreeId;

    /**
     * TargetParentLocationId
     *
     * @var mixed
     */
    public $targetParentLocationId;
}
