<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 */

if ( !$isQuiet )
{
    $cli->output( "Starting solr index optimization" );
}

// check that solr is enabled and used
$eZSolr = eZSearch::getEngine();
if ( !( $eZSolr instanceof eZSolr ) )
{
	$script->shutdown( 1, 'The current search engine plugin is not eZSolr' );
}

$eZSolr->optimize( false );

if ( !$isQuiet )
{
    $cli->output( "Done" );
}

?>
