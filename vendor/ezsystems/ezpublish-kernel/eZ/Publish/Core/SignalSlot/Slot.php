<?php
/**
 * File containing the SignalDispatcher class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot;

/**
 * A Slot can be assigned to receive a certain Signal.
 *
 * @internal
 */
abstract class Slot
{
    /**
     * Receive the given $signal and react on it
     *
     * @param Signal $signal
     *
     * @return void
     */
    abstract public function receive( Signal $signal );
}
