<?php
/**
 * AssignRoleToUserSignal class
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Publish\Core\SignalSlot\Signal\RoleService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * AssignRoleToUserSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\RoleService
 */
class AssignRoleToUserSignal extends Signal
{
    /**
     * RoleId
     *
     * @var mixed
     */
    public $roleId;

    /**
     * UserId
     *
     * @var mixed
     */
    public $userId;

    /**
     * RoleLimitation
     *
     * @var \eZ\Publish\API\Repository\Values\User\Limitation\RoleLimitation
     */
    public $roleLimitation;
}
