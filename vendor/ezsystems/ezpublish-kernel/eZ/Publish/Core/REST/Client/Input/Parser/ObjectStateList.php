<?php
/**
 * File containing the ObjectStateList parser class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Client\Input\Parser;

use eZ\Publish\Core\REST\Common\Input\Parser;
use eZ\Publish\Core\REST\Common\Input\ParsingDispatcher;

/**
 * Parser for ObjectStateList
 */
class ObjectStateList extends Parser
{
    /**
     * Parse input structure
     *
     * @param array $data
     * @param \eZ\Publish\Core\REST\Common\Input\ParsingDispatcher $parsingDispatcher
     *
     * @todo Error handling
     *
     * @return \eZ\Publish\API\Repository\Values\ObjectState\ObjectState[]
     */
    public function parse( array $data, ParsingDispatcher $parsingDispatcher )
    {
        $states = array();
        foreach ( $data['ObjectState'] as $rawStateData )
        {
            $states[] = $parsingDispatcher->parse(
                $rawStateData,
                $rawStateData['_media-type']
            );
        }
        return $states;
    }
}
