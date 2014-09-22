#!/usr/bin/env php
<?php
/**
 * File containing the ezerssfeedimport.php bin script
 *
 * @copyright Copyright (C) 1999 - 2015 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version 0.0.2
 * @package ezecosytem
 */

/** Add a starting timing point tracking script execution time **/

$srcStartTime = microtime();

/** Script autoloads initialization **/

require 'autoload.php';

/** Script startup and initialization **/

$cli = eZCLI::instance();
$script = eZScript::instance( array( 'description' => ( "eZ Publish RSS Feed Import Script\n" .
                                                        "\n" .
                                                        "ezerssfeedimport.php --rss-feed-export-id=36" ),
                                     'use-session' => false,
                                     'use-modules' => true,
                                     'use-extensions' => true,
                                     'user' => true ) );

$script->startup();

$options = $script->getOptions( "[script-verbose;][script-verbose-level;][rss-feed-export-id:]",
                                "[node]",
                                array( 'rss-feed-export-id' => 'Use this parameter to specificy the rss feed export id to be imported. Example: ' . "'--rss-feed-export-id=36'" . ' is a required parameter',
                                       'script-verbose' => 'Use this parameter to display verbose script output without disabling script iteration counting of images created or removed. Example: ' . "'--script-verbose'" . ' is an optional parameter which defaults to false',
                                       'script-verbose-level' => 'Use only with ' . "'--script-verbose'" . ' parameter to see more of execution internals. Example: ' . "'--script-verbose-level=3'" . ' is an optional parameter which defaults to 1 and works till 5'),
                                false,
                                array( 'user' => true ) );
$script->initialize();

/** Test for required script arguments **/

$verbose = isset( $options['script-verbose'] ) ? true : false;

$scriptVerboseLevel = isset( $options['script-verbose-level'] ) ? $options['script-verbose-level'] : 1;

$troubleshoot = ( isset( $options['script-verbose-level'] ) && $options['script-verbose-level'] > 0 ) ? true : false;

$rssFeedExportID = isset( $options['rss-feed-export-id'] ) ? $options['rss-feed-export-id'] : false;

if ( !$rssFeedExportID )
{
    $cli->error( "Script parameter --rss-feed-export-id is required" );

    /** Call for display of execution time **/
    executionTimeDisplay( $srcStartTime, $cli );

    $script->shutdown( 3 );
}

/** Script default values **/

$adminUserID = 14;
$publicationDateCount = 0;
$publicationDatePublishCount = 0;
$parentNodeID = 2;
$offset = 0;
$limit = 1000;

/** Display of execution time **/
function executionTimeDisplay( $srcStartTime, $cli )
{
    /** Add a stoping timing point tracking and calculating total script execution time **/
    $srcStopTime = microtime();
    $startTime = @next( explode( " ", $srcStartTime ) ) + current( explode( " ", $srcStartTime ) );
    $stopTime = @next( explode( " ", $srcStopTime ) ) + current( explode( " ", $srcStopTime ) );
    $executionTime = round( $stopTime - $startTime, 2 );

    /** Alert the user to how long the script execution took place **/
    $cli->output( "\n\nThis script execution completed in " . $executionTime . " seconds" . ".\n" );
}

/** Login script to run as admin user  This is required to see past content tree permissions, sections and other limitations **/

$currentuser = eZUser::currentUser();
$currentuser->logoutCurrent();
$user = eZUser::fetch( $adminUserID );
$user->loginCurrent();

/** Fetch total files count from content tree **/
/*
$totalFileCountParams = array( 'ClassFilterType' => 'include',
                               'ClassFilterArray' => array( 'forum_topic', 'blog_post', 'issue_post' ),
                               'Depth' => 10,
                               'MainNodeOnly' => true,
                               'SortBy' => array( 'published', true ),
                               'IgnoreVisibility' => true );
*/
/** Fetch total count for member content objects **/

//$totalFileCount = eZContentObjectTreeNode::subTreeCountByNodeID( $totalFileCountParams, $parentNodeID );

/** Debug verbose output **/
/*
if ( !$totalFileCount )
{
    $cli->error( "No member objects found" );
*/
    /** Call for display of execution time **/
/*    executionTimeDisplay( $srcStartTime, $cli );

    $script->shutdown( 3 );
}
elseif( $verbose && $totalFileCount > 0 )
{
    $cli->warning( "Total number of objects to be checked: " . $totalFileCount . "\n" );
}
*/
/** Setup script iteration details **/
/*
$script->setIterationData( '.', '.' );
$script->resetIteration( $totalFileCount );
*/
/** Iterate over nodes **/
/*
while ( $offset < $totalFileCount )
{
*/
    /** Fetch nodes under starting node in content tree **/
/*
    $subTreeParams = array( 'Limit' => $limit,
                            'Offset' => $offset,
                            'ClassFilterType' => 'include',
                            'ClassFilterArray' => array( 'forum_topic', 'blog_post' ),
                            'SortBy' => array( 'modified', false ),
                            'Depth' => 10,
                            'MainNodeOnly' => true,
                            'IgnoreVisibility' => true );
*/
    /** Optional debug output **/ /*

    if( $troubleshoot && $scriptVerboseLevel >= 5 )
    {
        $cli->output( "Member object fetch params: \n");
        $cli->output( print_r( $subTreeParams ) );
    }

    */ /** Fetch nodes with limit and offset **/ /*

    $subTree = eZContentObjectTreeNode::subTreeByNodeID( $subTreeParams, $parentNodeID );
    $subTreeCount = count( $subTree );

    */ /** Optional debug output **/ /*

    if( $troubleshoot && $scriptVerboseLevel >= 5 )
    {
        $cli->output( "Member objects fetched: ". $subTreeCount ."\n" );

        if( $troubleshoot && $scriptVerboseLevel >= 6 )
        {
            $cli->output( print_r( $subTree ) );
        }
    }

    */ /** Iterate over nodes **/ /*
    while ( list( $key, $childNode ) = each( $subTree ) )
    {
        $status = true;

        */ /** Fetch object details **/ /*
        $nodeID = $childNode->attribute('node_id');
        $nodeUrl = $childNode->attribute('url');

        $object = $childNode->attribute( 'object' );
        $objectID = $object->attribute( 'id' );
        $objectPublishedDate = $object->attribute( 'published' );
        $objectModifiedDate = $object->attribute( 'modified' );
        $objectDataMap = $object->dataMap();

        $objectPublicationDate = (string)$objectDataMap[ 'publication_date' ]->content()->timeStamp();

        */ /** Only iterate over objects with lng in the lat field **/ /*

        if( $objectPublicationDate != '' && $objectPublicationDate != 0 && ( $objectPublicationDate != $objectPublishedDate || $objectPublicationDate != $objectModifiedDate ) )
        {
            $publicationDateCount++;

            */ /** Debug verbose output **/ /*

            if( $troubleshoot && $scriptVerboseLevel >= 3 )
            {
                $cli->warning( "\nFound! Object pending published and modified date normalization: " . $nodeUrl . ", NodeID " . $nodeID . "\n" );

                $notice = "Object publication_date attribute content:  Current Published: " . date("F j, Y, g:i a", $objectPublishedDate ) . " && Current Modified: " . date("F j, Y, g:i a", $objectModifiedDate ) . " vs Attribute: " .date("F j, Y, g:i a", $objectPublicationDate );

                if( date("Y", $objectPublicationDate ) < 2006 || date("Y", $objectPublicationDate ) > 2015 )
                {
                    $cli->error( "Error: " . $notice );
                }
                else
                {
                    $cli->warning( $notice );
                }
            }

            */ /** Only modify object attributes when needed AND when not in test-only mode **/ /*

            if( !$test )
            {
                */ /** Modify objects and publish a new version with the published and modified attribute values modified **/ /*

                $object->setAttribute( 'published', $objectPublicationDate );
                $object->setAttribute( 'modified', $objectPublicationDate );
                $object->store();

                $publicationDatePublishCount++;

                */ /** Iterate cli script progress tracker **/ /*
                $script->iterate( $cli, $status );

                continue;
            }
        }
        else
        {
            */ /** Iterate cli script progress tracker **/ /*
            $script->iterate( $cli, $status );
        }
    }

    */ /** Iterate fetch function offset and continue **/ /*
    $offset = $offset + $subTreeCount;
}

*/ /** Clear all related caches **/ /*
eZContentCacheManager::clearAllContentCache();
eZUser::cleanupCache();

*/ /** Inform the script user of the results **/ /*
if( $test )
{
    $cli->warning( "\n\nTotal objects found needing the published and modified date to be updated: $publicationDateCount");
}
else
{
    $cli->warning( "\n\nTotal objects re-published with the published and modified date updated: $publicationDatePublishCount");
}

*/

/**
 * File containing the rssimport.php cronjob code
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version  2013.5
 * @package kernel
 */

//For ezUser, we would make this the ezUser class id but otherwise just pick and choose.

//fetch this class
$rssImportArray[] = eZRSSImport::fetch( $rssFeedExportID );

// Loop through all configured and active rss imports. If something goes wrong while processing them, continue to next import
foreach ( $rssImportArray as $rssImport )
{
    // Get RSSImport object
    $rssSource = $rssImport->attribute( 'url' );
    $addCount = 0;

    $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Starting.' );

    $xmlData = eZHTTPTool::getDataByURL( $rssSource, false, 'eZ Publish RSS Import' );
    if ( $xmlData === false )
    {
        $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Failed to open RSS feed file: '.$rssSource );
        continue;
    }

    // Create DomDocument from http data
    $domDocument = new DOMDocument( '1.0', 'utf-8' );
    $success = $domDocument->loadXML( $xmlData );

    if ( !$success )
    {
        $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Invalid RSS document.' );
        continue;
    }

    $root = $domDocument->documentElement;

    switch( $root->getAttribute( 'version' ) )
    {
        default:
        case '1.0':
        {
            $version = '1.0';
        } break;

        case '0.91':
        case '0.92':
        case '2.0':
        {
            $version = $root->getAttribute( 'version' );
        } break;
    }

    $importDescription = $rssImport->importDescription();
    if ( $version != $importDescription['rss_version'] )
    {
        $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Invalid RSS version missmatch. Please reconfigure import.' );
        continue;
    }

    switch( $root->getAttribute( 'version' ) )
    {
        default:
        case '1.0':
        {
            rssImport1( $root, $rssImport, $cli );
        } break;

        case '0.91':
        case '0.92':
        case '2.0':
        {
            rssImport2( $root, $rssImport, $cli );
        } break;
    }

}

eZStaticCache::executeActions();

/** Call for display of execution time **/
executionTimeDisplay( $srcStartTime, $cli );




/** Shutdown script **/
$script->shutdown();


/*!
  Parse RSS 1.0 feed

  \param DOM root node
  \param RSS Import item
  \param cli
*/
function rssImport1( $root, $rssImport, $cli )
{
    $addCount = 0;

    // Get all items in rss feed
    $itemArray = $root->getElementsByTagName( 'item' );
    $channel = $root->getElementsByTagName( 'channel' )->item( 0 );

    // Loop through all items in RSS feed
    foreach ( $itemArray as $item )
    {
        $addCount += importRSSItem( $item, $rssImport, $cli, $channel );
    }

    $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': End. '.$addCount.' objects added' );
}

/*!
  Parse RSS 2.0 feed

  \param DOM root node
  \param RSS Import item
  \param cli
*/
function rssImport2( $root, $rssImport, $cli )
{
    $addCount = 0;

    // Get all items in rss feed
    $channel = $root->getElementsByTagName( 'channel' )->item( 0 );

    // Loop through all items in RSS feed
    foreach ( $channel->getElementsByTagName( 'item' ) as $item )
    {
        $addCount += importRSSItem( $item, $rssImport, $cli, $channel );
    }

    $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': End. '.$addCount.' objects added' );
}

/*!
 Import specifiec rss item into content tree

 \param RSS item xml element
 \param $rssImport Object
 \param cli
 \param channel

 \return 1 if object added, 0 if not
*/
function importRSSItem( $item, $rssImport, $cli, $channel )
{
    $rssImportID = $rssImport->attribute( 'id' );
    $rssOwnerID = $rssImport->attribute( 'object_owner_id' ); // Get owner user id
    $parentContentObjectTreeNode = eZContentObjectTreeNode::fetch( $rssImport->attribute( 'destination_node_id' ) ); // Get parent treenode object

    if ( $parentContentObjectTreeNode == null )
    {
        $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Destination tree node seems to be unavailable' );
        return 0;
    }

    $parentContentObject = $parentContentObjectTreeNode->attribute( 'object' ); // Get parent content object
    $titleElement = $item->getElementsByTagName( 'title' )->item( 0 );
    $title = is_object( $titleElement ) ? $titleElement->textContent : '';

    // Test for link or guid as unique identifier
    $link = $item->getElementsByTagName( 'link' )->item( 0 );
    $guid = $item->getElementsByTagName( 'guid' )->item( 0 );
    $rssId = '';
    if ( $link->textContent )
    {
        $rssId = $link->textContent;
    }
    elseif ( $guid->textContent )
    {
        $rssId = $guid->textContent;
    }
    else
    {
        $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Item has no unique identifier. RSS guid or link missing.' );
        return 0;
    }
    $md5Sum = md5( $rssId );

    // Try to fetch RSSImport object with md5 sum matching link.
    $existingObject = eZPersistentObject::fetchObject( eZContentObject::definition(), null,
                                                       array( 'remote_id' => 'RSSImport_'.$rssImportID.'_'.$md5Sum ) );

    // if object exists, continue to next import item
    if ( $existingObject != null )
    {
        $cli->output( 'RSSImport ' . $rssImport->attribute( 'name' ) . ': Object ( ' . $existingObject->attribute( 'id' ) . ' ) with ID: "' . $rssId . '" already exists' );
        unset( $existingObject ); // delete object to preserve memory
        return 0;
    }

    // Fetch class, and create ezcontentobject from it.
    $contentClass = eZContentClass::fetch( $rssImport->attribute( 'class_id' )  );

    // Instantiate the object with user $rssOwnerID and use section id from parent. And store it.
    $contentObject = $contentClass->instantiate( $rssOwnerID, $parentContentObject->attribute( 'section_id' ) );

    $db = eZDB::instance();
    $db->begin();
    $contentObject->store();
    $contentObjectID = $contentObject->attribute( 'id' );

    // Create node assignment
    $nodeAssignment = eZNodeAssignment::create( array( 'contentobject_id' => $contentObjectID,
                                                       'contentobject_version' => $contentObject->attribute( 'current_version' ),
                                                       'is_main' => 1,
                                                       'parent_node' => $parentContentObjectTreeNode->attribute( 'node_id' ) ) );
    $nodeAssignment->store();

    $version = $contentObject->version( 1 );
    $version->setAttribute( 'status', eZContentObjectVersion::STATUS_DRAFT );
    $version->store();

    // Get object attributes, and set their values and store them.
    $dataMap = $contentObject->dataMap();
    $importDescription = $rssImport->importDescription();

    // Set content object attribute values.
    $classAttributeList = $contentClass->fetchAttributes();
    foreach( $classAttributeList as $classAttribute )
    {
        $classAttributeID = $classAttribute->attribute( 'id' );
        if ( isset( $importDescription['class_attributes'][$classAttributeID] ) )
        {
            if ( $importDescription['class_attributes'][$classAttributeID] == '-1' )
            {
                continue;
            }

            $importDescriptionArray = explode( ' - ', $importDescription['class_attributes'][$classAttributeID] );
            if ( count( $importDescriptionArray ) < 1 )
            {
                $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Invalid import definition. Please redit.' );
                break;
            }

            $elementType = $importDescriptionArray[0];
            array_shift( $importDescriptionArray );
            switch( $elementType )
            {
                case 'item':
                {
                    setObjectAttributeValue( $dataMap[$classAttribute->attribute( 'identifier' )],
                                             recursiveFindRSSElementValue( $importDescriptionArray,
                                                                           $item ) );
                } break;

                case 'channel':
                {
                    setObjectAttributeValue( $dataMap[$classAttribute->attribute( 'identifier' )],
                                             recursiveFindRSSElementValue( $importDescriptionArray,
                                                                           $channel ) );
                } break;
            }
        }
    }

    $contentObject->setAttribute( 'remote_id', 'RSSImport_'.$rssImportID.'_'. $md5Sum );
    $contentObject->store();
    $db->commit();

    // Publish new object. The user id is sent to make sure any workflow
    // requiring the user id has access to it.
    $operationResult = eZOperationHandler::execute( 'content', 'publish', array( 'object_id' => $contentObject->attribute( 'id' ),
                                                                                 'version' => 1,
                                                                                 'user_id' => $rssOwnerID ) );

    if ( !isset( $operationResult['status'] ) || $operationResult['status'] != eZModuleOperationInfo::STATUS_CONTINUE )
    {
        if ( isset( $operationResult['result'] ) && isset( $operationResult['result']['content'] ) )
            $failReason = $operationResult['result']['content'];
        else
            $failReason = "unknown error";
        $cli->error( "Publishing failed: $failReason" );
        unset( $failReason );
    }

    $db->begin();
    unset( $contentObject );
    unset( $version );
    $contentObject = eZContentObject::fetch( $contentObjectID );
    $version = $contentObject->attribute( 'current' );
    // Set object Attributes like modified and published timestamps
    $objectAttributeDescription = $importDescription['object_attributes'];
    foreach( $objectAttributeDescription as $identifier => $objectAttributeDefinition )
    {
        if ( $objectAttributeDefinition == '-1' )
        {
            continue;
        }

        $importDescriptionArray = explode( ' - ', $objectAttributeDefinition );

        $elementType = $importDescriptionArray[0];
        array_shift( $importDescriptionArray );
        switch( $elementType )
        {
            default:
            case 'item':
            {
                $domNode = $item;
            } break;

            case 'channel':
            {
                $domNode = $channel;
            } break;
        }

        switch( $identifier )
        {
            case 'modified':
            {
                $dateTime = recursiveFindRSSElementValue( $importDescriptionArray,
                                                          $domNode );
                if ( !$dateTime )
                {
                    break;
                }
                $contentObject->setAttribute( $identifier, strtotime( $dateTime ) );
                $version->setAttribute( $identifier, strtotime( $dateTime ) );
            } break;

            case 'published':
            {
                $dateTime = recursiveFindRSSElementValue( $importDescriptionArray,
                                                          $domNode );
                if ( !$dateTime )
                {
                    break;
                }
                $contentObject->setAttribute( $identifier, strtotime( $dateTime ) );
                $version->setAttribute( 'created', strtotime( $dateTime ) );
            } break;
        }
    }
    $version->store();
    $contentObject->store();
    $db->commit();

    $cli->output( 'RSSImport '.$rssImport->attribute( 'name' ).': Object created; ' . $title );

    return 1;
}

function recursiveFindRSSElementValue( $importDescriptionArray, $xmlDomNode )
{
    if ( !is_array( $importDescriptionArray ) )
    {
        return false;
    }

    $valueType = $importDescriptionArray[0];
    array_shift( $importDescriptionArray );
    switch( $valueType )
    {
        case 'elements':
        {
            if ( count( $importDescriptionArray ) == 1 )
            {
                $element = $xmlDomNode->getElementsByTagName( $importDescriptionArray[0] )->item( 0 );

                $resultText = is_object( $element ) ? $element->textContent : false;
                return $resultText;
            }
            else
            {
                $elementName = $importDescriptionArray[0];
                array_shift( $importDescriptionArray );
                return recursiveFindRSSElementValue( $importDescriptionArray, $xmlDomNode->getElementsByTagName( $elementName )->item( 0 ) );
            }
        }

        case 'attributes':
        {
            return $xmlDomNode->getAttribute( $importDescriptionArray[0] );
        } break;
    }
}

function setObjectAttributeValue( $objectAttribute, $value )
{
    if ( $value === false )
    {
        return;
    }

    $dataType = $objectAttribute->attribute( 'data_type_string' );
    switch( $dataType )
    {
        case 'ezxmltext':
        {
            setEZXMLAttribute( $objectAttribute, $value );
        } break;

        case 'ezurl':
        {
            $objectAttribute->setContent( $value );
        } break;

        case 'ezkeyword':
        {
            $keyword = new eZKeyword();
            $keyword->initializeKeyword( $value );
            $objectAttribute->setContent( $keyword );
        } break;

        case 'ezdate':
        {
            $timestamp = strtotime( $value );
            if ( $timestamp )
                $objectAttribute->setAttribute( 'data_int', $timestamp );
        } break;

        case 'ezdatetime':
        {
            $objectAttribute->setAttribute( 'data_int', strtotime($value) );
        } break;

        default:
        {
            $objectAttribute->setAttribute( 'data_text', $value );
        } break;
    }

    $objectAttribute->store();
}

function setEZXMLAttribute( $attribute, $attributeValue, $link = false )
{
    $contentObjectID = $attribute->attribute( "contentobject_id" );
    $parser = new eZSimplifiedXMLInputParser( $contentObjectID, false, 0, false );

    $attributeValue = str_replace( "\r", '', $attributeValue );
    $attributeValue = str_replace( "\n", '', $attributeValue );
    $attributeValue = str_replace( "\t", ' ', $attributeValue );

    $document = $parser->process( $attributeValue );
    if ( !is_object( $document ) )
    {
        $cli = eZCLI::instance();
        $cli->output( 'Error in xml parsing' );
        return;
    }
    $domString = eZXMLTextType::domString( $document );

    $attribute->setAttribute( 'data_text', $domString );
    $attribute->store();
}

?>
