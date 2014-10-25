#!/usr/bin/env php
<?php
/**
 * File containing the ezpresetviewcount.php bin script
 *
 * @copyright Copyright (C) 1999 - 2015 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version 0.0.1
 * @package ezecosystem
 */

/** Add a starting timing point tracking script execution time **/

$srcStartTime = microtime();

/** Script autoloads initialization **/

require 'autoload.php';

/** Script startup and initialization **/

$cli = eZCLI::instance();
$script = eZScript::instance( array( 'description' => ( "eZ Publish Node View Count Reset Script\n" .
                                                        "\n" .
                                                        "ezpresetviewcount.php --script-verbose" ),
                                     'use-session' => false,
                                     'use-modules' => true,
                                     'use-extensions' => true,
                                     'user' => true ) );

$script->startup();

$options = $script->getOptions( "[script-verbose;][script-verbose-level;][test-only;][classes:][threshold:][reset-number;]",
                                "[node]",
                                array( 'test-only' => 'Use this parameter to test for objects which need lat/lng attributes to be swapped. Test only no modifications to db made. Example: ' . "'--test-only'" . ' is an optional parameter which defaults to false',
                                       'script-verbose' => 'Use this parameter to display verbose script output without disabling script iteration counting of images created or removed. Example: ' . "'--script-verbose'" . ' is an optional parameter which defaults to false',
                                       'script-verbose-level' => 'Use only with ' . "'--script-verbose'" . ' parameter to see more of execution internals. Example: ' . "'--script-verbose-level=3'" . ' is an optional parameter which defaults to 1 and works till 5',
                                       'classes' => 'Use this parameter to specify which classes of content objects to reset view count. Example: ' . "'--classes=article|folder|blog_post'" . ' is a required parameter which defaults to article|folder',
                                       'threshold' => 'Use this parameter to specify the threshold (equal to or above) of view count which to reset. Example: ' . "'--threshold=75'" . ' is a required parameter which defaults to 75',
                                       'reset-number' => 'Use this parameter to specify the view count number to reset to. Example: ' . "'--reset-number=75'" . ' is a required parameter which defaults to 75'),
                                false,
                                array( 'user' => true ) );
$script->initialize();

/** Test for required script arguments **/

$verbose = isset( $options['script-verbose'] ) ? true : false;

$scriptVerboseLevel = isset( $options['script-verbose-level'] ) ? $options['script-verbose-level'] : 1;

$troubleshoot = ( isset( $options['script-verbose-level'] ) && $options['script-verbose-level'] > 0 ) ? true : false;

$test = isset( $options['test-only'] ) ? true : false;

$classes = isset( $options['classes'] ) ? explode( '|', $options['classes'] ) : array( 'article', 'folder' );

$threshold = isset( $options['threshold'] ) ? $options['threshold'] : 75;

$resetNumber = isset( $options['reset-number'] ) ? $options['reset-number'] : 75;

/** Script default values **/

$adminUserID = 14;
$viewCountChangeRequiredDetected = 0;
$viewCountChangeCount = 0;
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

$totalObjectCountParams = array( 'ClassFilterType' => 'include',
                                 'ClassFilterArray' => $classes,
                                 'Depth' => 10,
                                 'MainNodeOnly' => true,
                                 'SortBy' => array( 'published', true ),
                                 'IgnoreVisibility' => true );

/** Fetch total count for member content objects **/

$totalObjectCount = eZContentObjectTreeNode::subTreeCountByNodeID( $totalObjectCountParams, $parentNodeID );

/** Debug verbose output **/

if ( !$totalObjectCount )
{
    $cli->error( "No objects found" );

    /** Call for display of execution time **/
    executionTimeDisplay( $srcStartTime, $cli );

    $script->shutdown( 3 );
}

$cli->warning( "Total number of objects to be checked: " . $totalObjectCount . "\n" );

/** Setup script iteration details **/

$script->setIterationData( '.', '.' );
$script->resetIteration( $totalObjectCount );

/** Iterate over nodes **/

while ( $offset < $totalObjectCount )
{
    /** Fetch nodes under starting node in content tree **/

    $subTreeParams = array( 'Limit' => $limit,
                            'Offset' => $offset,
                            'ClassFilterType' => 'include',
                            'ClassFilterArray' => $classes,
                            'SortBy' => array( 'modified', false ),
                            'Depth' => 10,
                            'MainNodeOnly' => true,
                            'IgnoreVisibility' => true );

    /** Optional debug output **/

    if( $troubleshoot && $scriptVerboseLevel >= 5 )
    {
        $cli->output( "Content object node fetch params: \n");
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
        $nodeViewCount = $childNode->attribute( 'view_count' );

        $object = $childNode->attribute( 'object' );
        $objectID = $object->attribute( 'id' );

        //$cli->output( "Key: $nodeViewCount\n" );

        /** Only iterate over objects with lng in the lat field **/

        if( $nodeViewCount >= $threshold )
        {
            $viewCountChangeRequiredDetected++;

            /** Debug verbose output **/

            if( $troubleshoot && $scriptVerboseLevel >= 3 )
            {
                $cli->warning( "\nFound! Node with view count equal to or above threshold: " . $nodeUrl . ", NodeID " . $nodeID . "\n" );

                $notice = "Node view count: $nodeViewCount";

                $cli->warning( $notice );
            }

            /** Only modify node view count when needed AND when not in test-only mode **/

            if( !$test )
            {
                /** Modify objects and publish a new version with the published and modified attribute values modified **/

                $viewCounterObject = eZViewCounter::fetch( $nodeID );
                $viewCounterObject->setAttribute( 'count', $resetNumber );
                $viewCounterObject->store();

                $viewCountChangeCount++;

                /** Iterate cli script progress tracker **/
                $script->iterate( $cli, $status );

                continue;
            }
            else
            {
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

    // $cli->output( "\nOffset: " . $offset . " + SubTreeCount: " . $subTreeCount . " == " . ($offset + $subTreeCount) . " out of total: $totalObjectCount\n" );

    /** Iterate fetch function offset and continue **/
    $offset = $offset + $subTreeCount;
}

/** Clear all related caches **/
//eZContentCacheManager::clearAllContentCache();
//eZUser::cleanupCache();

/** Inform the script user of the results **/
if( $test )
{
    $cli->warning( "\n\nTotal nodes found needing the view count to be reset: $viewCountChangeRequiredDetected");
}
else
{
    $cli->warning( "\n\nTotal nodes view counter reset: $viewCountChangeCount");
}

/** Call for display of execution time **/
executionTimeDisplay( $srcStartTime, $cli );

/** Shutdown script **/
$script->shutdown();

?>