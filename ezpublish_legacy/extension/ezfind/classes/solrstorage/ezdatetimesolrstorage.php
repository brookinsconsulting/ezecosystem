<?php

/**
 * File containing the ezdatetimeSolrStorage class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 * @package ezfind
 */

class ezdatetimeSolrStorage extends ezdatatypeSolrStorage
{
    /**
     * @param eZContentObjectAttribute $contentObjectAttribute the attribute to serialize
     * @param eZContentClassAttribute $contentClassAttribute the content class of the attribute to serialize
     * @return array
     */
    public static function getAttributeContent( eZContentObjectAttribute $contentObjectAttribute, eZContentClassAttribute $contentClassAttribute )
    {
        $dateTime = new DateTime( '@' . $contentObjectAttribute->attribute( 'data_int' ) );
        return array(
            'content' => $dateTime->format( 'c' ),
            'has_rendered_content' => false,
            'rendered' => null,
        );
    }
}

?>
