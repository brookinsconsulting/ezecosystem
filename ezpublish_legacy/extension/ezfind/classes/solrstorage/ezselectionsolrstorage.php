<?php

/**
 * File containing the ezselectionSolrStorage class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 * @package ezfind
 */

class ezselectionSolrStorage extends ezdatatypeSolrStorage
{
    /**
     * @param eZContentObjectAttribute $contentObjectAttribute the attribute to serialize
     * @param eZContentClassAttribute $contentClassAttribute the content class of the attribute to serialize
     * @return array
     */
    public static function getAttributeContent( eZContentObjectAttribute $contentObjectAttribute, eZContentClassAttribute $contentClassAttribute )
    {
        $selectedOptionsList   = array_fill_keys( $contentObjectAttribute->content(), true );
        $availableOptionsArray = $contentObjectAttribute->attribute( 'class_content' );
        $finalAvailableOptions = array();

        foreach ( $availableOptionsArray['options'] as $availableOption )
        {
            if ( isset( $selectedOptionsList[$availableOption['id']] ) )
            {
                $finalAvailableOptions[] = array( 'name' => $availableOption['name'], 'id' => $availableOption['id'] );
            }
        }
        return array(
            'content' => $finalAvailableOptions,
            'has_rendered_content' => false,
            'rendered' => null,
        );
    }
}

?>
