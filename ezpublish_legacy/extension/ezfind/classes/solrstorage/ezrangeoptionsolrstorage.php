<?php

/**
 * File containing the ezrangeoptionSolrStorage class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 * @package ezfind
 */

class ezrangeoptionSolrStorage extends ezdatatypeSolrStorage
{
    /**
     * @param eZContentObjectAttribute $contentObjectAttribute the attribute to serialize
     * @param eZContentClassAttribute $contentClassAttribute the content class of the attribute to serialize
     * @return array
     */
    public static function getAttributeContent( eZContentObjectAttribute $contentObjectAttribute, eZContentClassAttribute $contentClassAttribute )
    {
        $option = $contentObjectAttribute->attribute( 'content' );

        return array(
            'content' => array(
                'name' => $option->attribute( 'name' ),
                'start_value' => $option->attribute( 'start_value' ),
                'stop_value' => $option->attribute( 'stop_value' ),
                'step_value' => $option->attribute( 'step_value' ),
            ),
            'has_rendered_content' => false,
            'rendered' => null,
        );
    }
}

?>
