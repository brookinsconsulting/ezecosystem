<?php
/**
 * File containing the Block id matcher class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Symfony\View\BlockViewProvider\Configured\Matcher\Id;

use eZ\Publish\Core\MVC\Symfony\View\BlockViewProvider\Configured\Matcher\MultipleValued;
use eZ\Publish\Core\FieldType\Page\Parts\Block as PageBlock;

class Block extends MultipleValued
{
    /**
     * Checks if a Block object matches.
     *
     * @param \eZ\Publish\Core\FieldType\Page\Parts\Block $block
     *
     * @return boolean
     */
    public function matchBlock( PageBlock $block )
    {
        return isset( $this->values[$block->id] );
    }
}
