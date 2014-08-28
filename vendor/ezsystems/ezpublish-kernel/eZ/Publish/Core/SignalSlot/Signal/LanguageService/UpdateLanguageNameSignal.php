<?php
/**
 * UpdateLanguageNameSignal class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\SignalSlot\Signal\LanguageService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * UpdateLanguageNameSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\LanguageService
 */
class UpdateLanguageNameSignal extends Signal
{
    /**
     * LanguageId
     *
     * @var mixed
     */
    public $languageId;

    /**
     * NewName
     *
     * @var mixed
     */
    public $newName;
}
