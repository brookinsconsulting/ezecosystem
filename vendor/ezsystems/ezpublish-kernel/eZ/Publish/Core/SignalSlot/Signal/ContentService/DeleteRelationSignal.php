<?php
/**
 * DeleteRelationSignal class
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Publish\Core\SignalSlot\Signal\ContentService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * DeleteRelationSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\ContentService
 */
class DeleteRelationSignal extends Signal
{
    /**
     * Content ID
     *
     * @var mixed
     */
    public $srcContentId;

    /**
     * Version Number
     *
     * @var int
     */
    public $srcVersionNo;

    /**
     * Content ID
     *
     * @var mixed
     */
    public $dstContentId;
}
