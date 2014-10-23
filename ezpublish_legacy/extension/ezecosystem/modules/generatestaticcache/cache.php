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
 * Fetch site.ini settings for Site url
 */
$ini = eZINI::instance();
$siteAccessList = $ini->variable( 'SiteAccessSettings', 'RelatedSiteAccessList' );

/**
 * Validate request to update cache
 */
if ( $http->hasPostVariable( 'GenerateButton' ) )
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
     * Test for existance of post variable, 'Recursive'
     */
    if ( $http->hasPostVariable( 'recursive' ) )
    {
        $recursive = '';
    }
    else
    {
        $recursive = "' '";
    }

    /**
     * Test for existance of post variable, 'Siteaccess'
     */
    if ( $http->hasPostVariable( 'siteaccess' ) )
    {
        $siteaccess = $http->postVariable( 'siteaccess' );
    }
    else
    {
        $siteaccess = "ezwebin_site_user";
    }

    /**
     * Perform update cache requests
     */
     // General cronjob part options
     $generatorWorkerScript = './extension/ezecosystem/bin/shell/generatestaticcacheindexes.sh';
     $options = "$siteaccess $uri $recursive"; //$currentSiteAccess;
     $result = '';

     $result = shell_exec( "$generatorWorkerScript $options;");

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
$Result['content'] = $tpl->fetch( 'design:generatestaticcache/cache.tpl' );
$Result['path'] = array( array( 'url' => false,
                                'text' => 'Generate Static Cache' ) );

?>
