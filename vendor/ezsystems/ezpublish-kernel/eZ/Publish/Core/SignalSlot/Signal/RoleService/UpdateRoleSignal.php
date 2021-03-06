<?php
/**
 * UpdateRoleSignal class
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Publish\Core\SignalSlot\Signal\RoleService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * UpdateRoleSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\RoleService
 */
class UpdateRoleSignal extends Signal
{
    /**
     * RoleId
     *
     * @var mixed
     */
    public $roleId;
}
