#!/usr/bin/env php
<?php
/**
 * File containing the ezpremoveviewcountformissingnodes.php bin script
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
$script = eZScript::instance( array( 'description' => ( "eZ Publish Remove View Count For Missing Nodes Script\n" .
                                                        "\n" .
                                                        "ezpremoveviewcountformissingnodes.php --script-verbose" ),
                                     'use-session' => false,
                                     'use-modules' => true,
                                     'use-extensions' => true,
                                     'user' => true ) );

$script->startup();

$options = $script->getOptions( "[script-verbose;][script-verbose-level;][test-only;][classIDs:][sectionIDs:][limit;][offset;]",
                                "[node]",
                                array( 'test-only' => 'Use this parameter to test for objects which need lat/lng attributes to be swapped. Test only no modifications to db made. Example: ' . "'--test-only'" . ' is an optional parameter which defaults to false',
                                       'script-verbose' => 'Use this parameter to display verbose script output without disabling script iteration counting of images created or removed. Example: ' . "'--script-verbose'" . ' is an optional parameter which defaults to false',
                                       'script-verbose-level' => 'Use only with ' . "'--script-verbose'" . ' parameter to see more of execution internals. Example: ' . "'--script-verbose-level=3'" . ' is an optional parameter which defaults to 1 and works till 5',
                                       'classIDs' => 'Use this parameter to specify which classes of content objects to fetch from view count database. Example: ' . "'--classIDs=1|16|19'" . ' is a required parameter which defaults to 1|16',
                                       'sectionIDs' => 'Use this parameter to specify which sections used by classIDs of content objects to fetch from view count database. Example: ' . "'--sectionIDs=1|3|2'" . ' is a required parameter which defaults to 1|3',
                                       'limit' => 'Use this parameter to specify the limit (number of) top view count entries which to search. Example: ' . "'--limit=10000'" . ' is an optional parameter which defaults to false',
                                       'offset' => 'Use this parameter to specify the top view count offset number used to search. Example: ' . "'--offset=10000'" . ' is an optional parameter which defaults to false'),
                                false,
                                array( 'user' => true ) );
$script->initialize();

/** Test for required script arguments **/

$verbose = isset( $options['script-verbose'] ) ? true : false;

$scriptVerboseLevel = isset( $options['script-verbose-level'] ) ? $options['script-verbose-level'] : 1;

$troubleshoot = ( isset( $options['script-verbose-level'] ) && $options['script-verbose-level'] > 0 ) ? true : false;

$test = isset( $options['test-only'] ) ? true : false;

$classIDs = isset( $options['classIDs'] ) ? explode( '|', $options['classIDs'] ) : array( '1', '16' );

$sectionIDs = isset( $options['sectionIDs'] ) ? explode( '|', $options['sectionIDs'] ) : array( '1', '3' );

$offset = isset( $options['offset'] ) ? $options['offset'] : false;

$limit = isset( $options['limit'] ) ? $options['limit'] : false;

/** Script default values **/

$adminUserID = 14;
$viewCountRemoveRequiredDetected = 0;
$viewCountRemoveCount = 0;
$topListCount = 0;
$status = true;

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

/** Iterate over classID parameters **/

foreach( $classIDs as $classIDKey => $classID )
{
    $sectionID = $sectionIDs[ $classIDKey ];

    /** Fetch top view count of content object nodes **/
    $topList = eZViewCounter::fetchTopList( $classID, $sectionID, $offset, $limit );

    $topListCount += count( $topList );

    /** Optional debug output **/

    if( $troubleshoot && $scriptVerboseLevel >= 5 )
    {
        $cli->output( "View count entries fetched: ". $topListCount ."\n" );

        if( $troubleshoot && $scriptVerboseLevel >= 6 )
        {
            $cli->output( print_r( $topList ) );
        }
    }

    foreach ( array_keys ( $topList ) as $key )
    {
        $nodeID = $topList[ $key ][ 'node_id' ];

        /** Iterate over node **/
        $contentNode = eZContentObjectTreeNode::fetch( $nodeID );

        /** Content object node missing from database **/
        if ( $contentNode === null )
        {
            $viewCountRemoveRequiredDetected++;

            if( $troubleshoot && $scriptVerboseLevel >= 3 )
            {
                 $cli->warning( "\nFound! Node missing from database. NodeID: " . $nodeID . "\n" );
            }

            /** Only modify view count database when needed AND when not in test-only mode **/

            if( !$test )
            {
                /** Modify objects and publish a new version with the published and modified attribute values modified **/

                eZViewCounter::removeCounter( $nodeID );
                $viewCountRemoveCount++;

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
    }
}

/** Inform the script user of the results **/
if( $test )
{
    $cli->warning( "\n\nTotal nodes found needing to be removed: $viewCountRemoveRequiredDetected");
}
else
{
    $cli->warning( "\n\nTotal nodes removed from view count database: $viewCountRemoveCount");
}

/** Call for display of execution time **/
executionTimeDisplay( $srcStartTime, $cli );

/** Shutdown script **/
$script->shutdown();

?>