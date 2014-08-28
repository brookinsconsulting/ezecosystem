<?php
/**
 * File containing the Location class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Client\Values\Content;

/**
 * Implementation of the {@link \eZ\Publish\API\Repository\Values\Content\Location}
 * class.
 *
 * @see \eZ\Publish\API\Repository\Values\Content\Location
 */
class Location extends \eZ\Publish\API\Repository\Values\Content\Location
{
    /**
     * ContentInfo
     *
     * @var \eZ\Publish\API\Repository\Values\Content\ContentInfo
     */
    protected $contentInfo;

    /**
     * Returns the content info of the content object of this location
     *
     * @return \eZ\Publish\API\Repository\Values\Content\ContentInfo
     */
    public function getContentInfo()
    {
        return $this->contentInfo;
    }
}
