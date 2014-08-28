<?php
/**
 * File containing the eZ\Publish\API\Repository\Values\Content\Search\Facet\UserFacet class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */
namespace eZ\Publish\API\Repository\Values\Content\Search\Facet;

use eZ\Publish\API\Repository\Values\Content\Search\Facet;

/**
 * This class holds counts for content owned, created or modified by users
 *
 */
class UserFacet extends Facet
{
    /**
     * An array with user id as key and count of matching content objects as value
     *
     * @var array
     */
    public $entries;
}
