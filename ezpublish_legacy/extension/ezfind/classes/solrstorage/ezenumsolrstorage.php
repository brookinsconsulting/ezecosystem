<?php

/**
 * File containing the ezenumSolrStorage class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 * @package ezfind
 */

class ezenumSolrStorage extends ezdatatypeSolrStorage
{
    /**
     * @param eZContentObjectAttribute $contentObjectAttribute the attribute to serialize
     * @param eZContentClassAttribute $contentClassAttribute the content class of the attribute to serialize
     * @return array
     */
    public static function getAttributeContent( eZContentObjectAttribute $contentObjectAttribute, eZContentClassAttribute $contentClassAttribute )
    {
        $availableEnumerations = array();
        foreach ( $contentObjectAttribute->content()->ObjectEnumerations  as $enumeration )
        {
            $availableEnumerations[] = array(
                'id' => $enumeration->EnumID,
                'element' => $enumeration->EnumElement,
                'value' => $enumeration->EnumValue
            );
        }

        return array(
            'content' => $availableEnumerations,
            'has_rendered_content' => false,
            'rendered' => null,
        );
    }
}

?>
