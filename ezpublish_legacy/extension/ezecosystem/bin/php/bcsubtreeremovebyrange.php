#!/usr/bin/env php
<?php
/**
 * File containing a script to remove nodes from content tree of eZ Publish
 * which is based on the code provided by the './bin/php/ezsubtreeremove.php'
 * commandline script to accurately remove nodes from the content tree.
 *
 * @copyright Copyright (C) 1999 - 2011 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt GNU GPL v2 (or later)
 * @version //autogentag//
 * @package bcsubtreeremovebyrange
 */

// Load existing class autoloads
require('autoload.php');

// Set script error reporting options
error_reporting( E_ALL | E_NOTICE );

// Load cli and script environment
$cli = eZCLI::instance();
$script = eZScript::instance( array( 'description' => ( "bcsubtreeremovebyrange.php command line script\n" .
                                                         "Removes nodes in the content tree " .
                                                         "within the specified range of NodeIDs.\n\n" .
                                                         "extension/bcsubtreeremovebyrange/bin/php/bcsubtreeremovebyrange.php --range-start-node-id=3000 --range-end-node-id=4000000 --ignore-trash=true --remove-children=true" ),
                                      'use-session'    => true,
                                      'use-modules'    => true,
                                      'use-extensions' => true ) );

$script->startup();

// Fetch default script options
$options = $script->getOptions( "[range-start-node-id:][range-end-node-id:][ignore-trash:]",
                                "",
                                array( 'range-start-node-id' => 'NodeID of the first node in given range. Required. Example ' . "'--range-start-node-id=20000'. No defaults",
                                       'range-end-node-id' => "NodeID of the last node in given range. Required. Example '--range-end-node-id=7000000'. No defaults",
                                       'ignore-trash' => "Skip moving nodes into trash and remove nodes completely. Not required. Example '--ignore-trash=false'. Defaults to true",
                                       'remove-children' => "Remove children of nodes specified by the range of NodeIDs. Not required. Example '--remove-children=true'. Defaults to true" ) );

$script->initialize();

// Load default site settings
$ini = eZINI::instance();

// Test for required script parameters, 'nodes'
if ( !empty( $options['range-start-node-id'] ) && !empty( $options['range-end-node-id'] ) )
{
    $start = $options['range-start-node-id'];
    $end = $options['range-end-node-id'];
}
else
{
    // Alert user of script requirements
    $cli->warning( "Please specify both the range-start-node-id and range-end-node-id script parameters required to remove nodes by range of NodeIDs." );
    $script->showHelp();
    $script->shutdown( 1 );
}

// Test script parameter defaults
if( isset( $options['ignore-trash'] ) && $options['ignore-trash'] == 'true' )
{
    $argumentsTrash = true;
    $moveToTrashStr = $argumentsTrash ? 'true' : 'false';
}
elseif( isset( $options['ignore-trash'] ) && $options['ignore-trash'] == 'false' )
{
    $argumentsTrash = false;
}
else
{
    $argumentsTrash = true;
}

// Test script parameter defaults
if( isset( $options['remove-children'] ) && $options['remove-children'] == 'true' )
{
    $argumentsRemoveChildren = true;
}
elseif( isset( $options['remove-children'] ) && $options['remove-children'] == 'false' )
{
    $argumentsRemoveChildren = false;
}
else
{
    $argumentsRemoveChildren = true;
}

// Prepare to remove nodes while tracking results
$results = false;
$deleteIDArrayResult = array();

// Get user's ID who can remove subtrees. (Admin by default with userID = 14)
$userCreatorID = $ini->variable( "UserSettings", "UserCreatorID" );
$user = eZUser::fetch( $userCreatorID );

// Test for valid user object
if ( !$user )
{
    $cli->error( "Subtree remove Error!\nCannot get user object by userID = '$userCreatorID'.\n(See site.ini[UserSettings].UserCreatorID)" );
    $script->shutdown( 1 );
}

// Login as user
eZUser::setCurrentlyLoggedInUser( $user, $userCreatorID );

/**
 * Iterate over nodes in provided range, test to ensure nodeID in range exists.
 */
if( isset( $start ) && isset( $end ) )
{
    foreach( range( $start, $end ) as $nodeID )
    {
        if( $argumentsRemoveChildren == true )
        {
            $childNodes = eZContentObjectTreeNode::subTreeByNodeID( array('AsObject' => false), $nodeID );

            /**
             * Test for valid results
             */
            if ( $childNodes === null or !is_array( $childNodes ) )
            {
                $cli->error( "\nSubtree remove Error!\nCannot find subtree with nodeID: '$nodeID'." );
                continue;
            }

            /**
             * Add first node in range to list of nodes to remove
             */
            $deleteIDArrayResult[] = $nodeID;

            /**
             * Add child nodes under the node subtree within the specified in range to list of nodes to remove
             */
            foreach( $childNodes as $iterationNode )
            {
                $deleteIDArrayResult[] = $iterationNode->attribute( 'node_id' );
            }
        }
        else
        {
            $node = eZContentObjectTreeNode::fetch( $nodeID );

            /**
             * Test for valid results
             */
            if ( $node === null )
            {
                $cli->error( "\nSubtree remove Error!\nCannot find subtree with nodeID: '$nodeID'." );
                continue;
            }

            /**
             * Add first node in range to list of nodes to remove
             */
            $deleteIDArrayResult[] = $nodeID;
        }
    }
}

/**
 * Prepare to remove nodes in provided range
 * Get subtree removal information
 */
$info = eZContentObjectTreeNode::subtreeRemovalInformation( $deleteIDArrayResult );

$deleteResult = $info['delete_list'];

if ( count( $deleteResult ) == 0 )
{
    $cli->output( "\nExiting script abnormally. No nodes were able to be removed. Check the admin for the nodes in range.\n" );
    $script->shutdown( 1 );
}

$totalChildCount = $info['total_child_count'];
$canRemoveAll = $info['can_remove_all'];
$reverseRelatedCount = $info['reverse_related_count'];

$cli->output( "\nTotal child count: $totalChildCount" );
$cli->output( "Move to trash: $moveToTrashStr" );
$cli->output( "Reverse related count: $reverseRelatedCount\n" );

$cli->output( "Removing subtrees:\n" );

foreach ( $deleteResult as $deleteItem )
{
    $node = $deleteItem['node'];
    $nodeName = $deleteItem['node_name'];
    if ( $node === null )
    {
        $cli->error( "\nSubtree remove Error!\nCannot find subtree '$nodeName'." );
        continue;
    }
    $nodeID = $node->attribute( 'node_id' );
    $childCount = $deleteItem['child_count'];
    $objectNodeCount = $deleteItem['object_node_count'];

    $cli->output( "Node id: $nodeID" );
    $cli->output( "Node name: $nodeName" );

    $canRemove = $deleteItem['can_remove'];
    if ( !$canRemove )
    {
        $cli->error( "\nSubtree remove Error!\nInsufficient permissions. You do not have permissions to remove the subtree with nodeID: $nodeID\n" );
        continue;
    }
    $cli->output( "Child count: $childCount" );
    $cli->output( "Object node count: $objectNodeCount" );

    // Remove subtrees
    eZContentObjectTreeNode::removeSubtrees( array( $nodeID ), $argumentsTrash );

    // We should make sure that all subitems have been removed.
    $itemInfo = eZContentObjectTreeNode::subtreeRemovalInformation( array( $nodeID ) );
    $itemTotalChildCount = $itemInfo['total_child_count'];
    $itemDeleteList = $itemInfo['delete_list'];

    /*
    if ( count( $itemDeleteList ) != 0 or ( $childCount != 0 and $itemTotalChildCount != 0 ) )
        $cli->error( "\nWARNING!\nSome subitems have not been removed.\n" );
    else
        $cli->output( "Successfuly DONE.\n" );
    */
}

// Prepare exit message to user
if ( count( $itemDeleteList ) != 0 or ( $childCount != 0 and $itemTotalChildCount != 0 ) )
{
    $cli->error( "\nWARNING!\n The script has completed normally but some nodes have not been removed successfully.\n" );
}
else
{
    // Alert user to script completion result summary
    $cli->output( "\n" . 'The script has exited normally. Assume nodes removed successfully.' . "\n" );
    $cli->output( "\n" . 'Review the script execution output and admin to confirm results.' . "\n" );
}

// Exit script normally
$script->shutdown();

?>
