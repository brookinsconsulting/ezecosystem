#!/usr/bin/env php
<?php
/**
 * File containing the ezpnormalizelatlng.php bin script
 *
 * @copyright Copyright (C) 1999 - 2015 Brookins Consulting. All rights reserved.
 * @copyright Copyright (C) 2013 - 2015 Think Creative. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version 0.0.3
 * @package site
 */

/** Add a starting timing point tracking script execution time **/

$srcStartTime = microtime();

/** Script autoloads initialization **/

require 'autoload.php';

/** Script startup and initialization **/

$cli = eZCLI::instance();
$script = eZScript::instance( array( 'description' => ( "eZ Publish Published and Modified Date Normalization Script\n" .
                                                        "\n" .
                                                        "ezpnormalizepublishdate.php --script-verbose" ),
                                     'use-session' => false,
                                     'use-modules' => true,
                                     'use-extensions' => true,
                                     'user' => true ) );

$script->startup();

$options = $script->getOptions( "[script-verbose;][script-verbose-level;][test-only;]",
                                "[node]",
                                array( 'test-only' => 'Use this parameter to test for objects which need lat/lng attributes to be swapped. Test only no modifications to db made. Example: ' . "'--test-only'" . ' is an optional parameter which defaults to false',
                                       'script-verbose' => 'Use this parameter to display verbose script output without disabling script iteration counting of images created or removed. Example: ' . "'--script-verbose'" . ' is an optional parameter which defaults to false',
                                       'script-verbose-level' => 'Use only with ' . "'--script-verbose'" . ' parameter to see more of execution internals. Example: ' . "'--script-verbose-level=3'" . ' is an optional parameter which defaults to 1 and works till 5'),
                                false,
                                array( 'user' => true ) );
$script->initialize();

/** Test for required script arguments **/

$verbose = isset( $options['script-verbose'] ) ? true : false;

$scriptVerboseLevel = isset( $options['script-verbose-level'] ) ? $options['script-verbose-level'] : 1;

$troubleshoot = ( isset( $options['script-verbose-level'] ) && $options['script-verbose-level'] > 0 ) ? true : false;

$test = isset( $options['test-only'] ) ? true : false;

/** Script default values **/

$adminUserID = 14;
$publicationDateCount = 0;
$publicationDatePublishCount = 0;
$parentNodeID = 2;
$offset = 0;
$limit = 100;

/** Display of execution time **/
function executionTimeDisplay( $srcStartTime, $cli )
{
    /** Add a stoping timing point tracking and calculating total script execution time **/
    $srcStopTime = microtime();
    $startTime = next( explode( " ", $srcStartTime ) ) + current( explode( " ", $srcStartTime ) );
    $stopTime = next( explode( " ", $srcStopTime ) ) + current( explode( " ", $srcStopTime ) );
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

$totalFileCountParams = array( 'ClassFilterType' => 'include',
                               'ClassFilterArray' => array( 'forum_topic', 'blog_post' ),
                               'Depth' => 10,
                               'MainNodeOnly' => true,
                               'IgnoreVisibility' => true );

/** Fetch total count for member content objects **/

$totalFileCount = eZContentObjectTreeNode::subTreeCountByNodeID( $totalFileCountParams, $parentNodeID );

/** Debug verbose output **/

if ( !$totalFileCount )
{
    $cli->error( "No member objects found" );

    /** Call for display of execution time **/
    executionTimeDisplay( $srcStartTime, $cli );

    $script->shutdown( 3 );
}
elseif( $verbose && $totalFileCount > 0 )
{
    $cli->warning( "Total member objects to be checked: " . $totalFileCount . "\n" );
}

/** Setup script iteration details **/

$script->setIterationData( '.', '.' );
$script->resetIteration( $totalFileCount );

/** Iterate over nodes **/

while ( $offset < $totalFileCount )
{
    /** Fetch nodes under starting node in content tree **/

    $subTreeParams = array( 'Limit' => $limit,
                            'Offset' => $offset,
                            'ClassFilterType' => 'include',
                            'ClassFilterArray' => array( 'forum_topic', 'blog_post' ),
                            'SortBy' => array( 'modified', false ),
                            'Depth' => 10,
                            'MainNodeOnly' => true,
                            'IgnoreVisibility' => true );

    /** Optional debug output **/

    if( $troubleshoot && $scriptVerboseLevel >= 5 )
    {
        $cli->output( "Member object fetch params: \n");
        $cli->output( print_r( $subTreeParams ) );
    }

    /** Fetch nodes with limit and offset **/

    $subTree = eZContentObjectTreeNode::subTreeByNodeID( $subTreeParams, $parentNodeID );
    $subTreeCount = count( $subTree );

    /** Optional debug output **/

    if( $troubleshoot && $scriptVerboseLevel >= 5 )
    {
        $cli->output( "Member objects fetched: ". $subTreeCount ."\n" );

        if( $troubleshoot && $scriptVerboseLevel >= 6 )
        {
            $cli->output( print_r( $subTree ) );
        }
    }

    /** Iterate over nodes **/
    while ( list( $key, $childNode ) = each( $subTree ) )
    {
        $status = true;

        /** Fetch object details **/
        $nodeID = $childNode->attribute('node_id');
        $nodeUrl = $childNode->attribute('url');

        $object = $childNode->attribute( 'object' );
        $objectID = $object->attribute( 'id' );
        $objectPublishedDate = $object->attribute( 'published' );
        $objectModifiedDate = $object->attribute( 'modified' );
        $objectDataMap = $object->dataMap();

        $objectPublicationDate = (string)$objectDataMap[ 'publication_date' ]->content()->timeStamp();
        // print_r( $objectPublicationDate );die();

        /** Only iterate over objects with lng in the lat field **/

        //if( $objectLatitude )
        if( $objectPublicationDate != '' && $objectPublicationDate != 0 )
        {
            $publicationDateCount++;

            /** Debug verbose output **/

            if( $troubleshoot && $scriptVerboseLevel >= 3 )
            {
                $cli->warning( "\nFound! Member object pending attribute swap: " . $nodeUrl . ", NodeID " . $nodeID . "\n" );
                $cli->warning( "Object publication_date attribute content:  " . date("F j, Y, g:i a", $objectPublicationDate ) );
            }

            /** Only modify object attributes when needed AND when not in test-only mode **/
            if( !$test )
            {
                /** Modify member object and publish a new version with the published and modified attribute values modified **/
                if( $objectPublicationDate != $objectPublishedDate || $objectPublicationDate != $objectModifiedDate )
                {
                    $object->setAttribute( 'published', strtotime( $objectPublicationDate ) );
                    $object->setAttribute( 'modified', strtotime( $objectPublicationDate ) );
                    $object->store();
                }
                else
                {
                    continue;
                }
                

                $updateParams = array();
                $updateAttributeList = array( );
                $updateParams['attributes'] = $updateAttributeList;

                /** Optional debug output **/

                if( $troubleshoot && $scriptVerboseLevel >= 5 )
                {
                    $cli->output( "Objects update params: ");
                    $cli->output( "Published and modified Date: " . date("F j, Y, g:i a", $objectPublicationDate ) );
                }

                $updateResult = eZContentFunctions::updateAndPublishObject( $object, $updateParams );

                if( $updateResult )
                {
                    $publicationDatePublishCount++;

                    /** Debug verbose output **/

                    if( $verbose )
                    {
                        $cli->output( "Fixed: Published new member object version with published and modifed date values normalized\n");
                    }
                }

                /** Iterate cli script progress tracker **/
                $script->iterate( $cli, $status );
            }
        }
        else
        {
            /** Iterate cli script progress tracker **/
            $script->iterate( $cli, $status );
        }
    }

    /** Iterate fetch function offset and continue **/
    $offset = $offset + $subTreeCount;
}

/** Clear all related caches **/
eZContentCacheManager::clearAllContentCache();
eZUser::cleanupCache();

/** Inform the script user of the results **/
if( $test )
{
    $cli->warning( "\n\nTotal objects found needing the attributes to be swapped: $publicationDateCount");
}
else
{
    $cli->warning( "\n\nTotal objects re-published with the lat/lng attribute values swapped: $publicationDatePublishCount");
}

/** Call for display of execution time **/
executionTimeDisplay( $srcStartTime, $cli );

/** Shutdown script **/
$script->shutdown();

?>