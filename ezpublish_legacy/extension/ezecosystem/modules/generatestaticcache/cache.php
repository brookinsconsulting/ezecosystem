<?php
/**
 * File containing the generatestaticcache/cache module view.
 *
 * @copyright Copyright (C) 1999 - 2011 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version //autogentag//
 * @package generatestaticcache
 */

/**
 * Disable module view execution time limit
 */
set_time_limit( 0 );

/**
 * Default module parameters
 */
$Module = $Params['Module'];

/**
 * Default class instances
 */
$http = eZHTTPTool::instance();
$tpl = eZTemplate::factory();

/**
 * Fetch site.ini settings
 */
$ini = eZINI::instance();
$siteAccessList = $ini->variable( 'SiteAccessSettings', 'RelatedSiteAccessList' );

/**
 * Validate request to update cache
 */
if( $http->hasPostVariable( 'GenerateButton' ) )
{
    /**
     * Test for existance of post variable, 'Uri'
     */
    if ( $http->hasPostVariable( 'uri' ) )
    {
        $uri = $http->postVariable( 'uri' );
    }
    else
    {
        $uri = '/';
    }

    /**
     * Test for existance of post variable, 'recursive'
     */
    if ( $http->hasPostVariable( 'recursive' ) )
    {
        $recursive = ' --children';
    }
    else
    {
        $recursive = '';
    }

    /**
     * Test for existance of post variable, 'siteaccess'
     */
    if ( $http->hasPostVariable( 'siteaccess' ) )
    {
        $siteaccess = $http->postVariable( 'siteaccess' );
    }
    else
    {
        $siteaccess = $siteAccessList[0];
    }

    /**
     * Perform update cache requests
     */
     // General cronjob part options
     $generatorWorkerScript = 'php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php';
     $options = "--subtree=$uri$recursive --force -s $siteaccess";
     $result = '';

     $result = shell_exec( "$generatorWorkerScript $options >> var/log/process_output.log 2>> var/log/process_error.log &");

    /**
     * Calculate update cache request result on status page
     */
    if ( $result != '' )
    {
        $tpl->setVariable( 'output', $result );
        $tpl->setVariable( 'uri', $uri );
        $tpl->setVariable( 'recursive', $recursive == '' ? true : false  );
        $tpl->setVariable( 'siteaccess_list', $siteAccessList );
        $tpl->setVariable( 'current_siteaccess', $siteaccess );

        $Result['path'] = array( array( 'url' => false,
                                        'text' => 'Generate Static Cache' ),
                                 array( 'url' => false, 'text' => 'Generate Static Cache' ) );
        $Result['content'] = $tpl->fetch( 'design:generatestaticcache/cache.tpl' );

        return;
    }
}

/**
 * Prepare module view content results for display to user
 */
$tpl->setVariable( 'output', false );
$tpl->setVariable( 'uri', '/' );
$tpl->setVariable( 'recursive', false  );
$tpl->setVariable( 'siteaccess_list', $siteAccessList );
$tpl->setVariable( 'current_siteaccess', $siteAccessList[0] );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:generatestaticcache/cache.tpl' );
$Result['left_menu'] = "design:generatestaticcache/backoffice_leftmenu.tpl";
$Result['path'] = array( array( 'url' => false,
                                'text' => 'Generate Static Cache' ) );

?>