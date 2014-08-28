<?php
/**
 * File containing the ContentList class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\Core\REST\Common\Value as RestValue;

/**
 * Content list view model
 */
class ContentList extends RestValue
{
    /**
     * Contents
     *
     * @var \eZ\Publish\Core\REST\Server\Values\RestContent[]
     */
    public $contents;

    /**
     * Construct
     *
     * @param \eZ\Publish\Core\REST\Server\Values\RestContent[] $contents
     */
    public function __construct( array $contents )
    {
        $this->contents = $contents;
    }
}
