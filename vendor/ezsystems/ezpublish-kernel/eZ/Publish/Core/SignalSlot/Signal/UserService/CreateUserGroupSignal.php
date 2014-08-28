<?php
/**
 * CreateUserGroupSignal class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot\Signal\UserService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * CreateUserGroupSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\UserService
 */
class CreateUserGroupSignal extends Signal
{
    /**
     * User Group ID
     *
     * @var mixed
     */
    public $userGroupId;
}
