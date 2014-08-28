<?php
/**
 * SetPriorityOfObjectStateSignal class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot\Signal\ObjectStateService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * SetPriorityOfObjectStateSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\ObjectStateService
 */
class SetPriorityOfObjectStateSignal extends Signal
{
    /**
     * ObjectStateId
     *
     * @var mixed
     */
    public $objectStateId;

    /**
     * Priority
     *
     * @var mixed
     */
    public $priority;
}
