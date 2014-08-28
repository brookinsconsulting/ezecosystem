<?php
/**
 * File containing the eZ\Publish\API\Repository\Values\Content\Search\Facet class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */
namespace eZ\Publish\API\Repository\Values\Content\Search;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * Base class for facets
 *
 */
abstract class Facet extends ValueObject
{
    /**
     * The name of the facet
     *
     * @var string
     */
    public $name;
}

